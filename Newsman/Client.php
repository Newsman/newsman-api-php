<?php 
require_once(dirname(__FILE__) . "/Client/Exception.php");

class Newsman_Client
{
	/**
	 * The API URL
	 * @var string
	 */
	protected $api_url = "https://ssl.newsman.ro/api";
	
	/**
	 * The user ID	
	 * @var string
	 */
	protected $user_id;

	/**
	 * The API key
	 * @var string
	 */
	protected $api_key;

	/**
	 * The API version: only 1.2 for now
	 * @var string
	 */
	protected $api_version = "1.2";
	
	/**
	 * Output format: json or ser (php serialize), required for rest calls only, ignored for rpc
	 * @var string
	 */
	protected $output_format = "json";
	
	/**
	 * The method namespace
	 * @var string
	 */
	protected $method_namespace = null;

	/**
	 * The method name
	 * @var string
	 */
	protected $method_name = null;

	/**
	 * Call type: rpc or rest (default rpc)
	 * @var string
	 */
	protected $call_type = null;
		
	/**
	 * Transport (http post client)
	 * Supported values for rpc: Zend_XmlRpc_Client or xmlrpc_encode
	 * Supported values for rest: Zend_Http_Client and curl
	 * @var string
	 */
	protected $transport = "zend_xmlrpc_client";
	
	/**
	 * Newsman V2 REST API - Client 
	 * @param $user_id string
	 * @param $api_key string
	 */
	public function __construct($user_id, $api_key)
	{
		$this->user_id = $user_id;
		$this->api_key = $api_key;
		
		$this->_detectTransport();
	}
	
	/**
	 * Detect the transport (zend_http_client or curl)
	 */
	protected function _detectTransport()
	{
		@include_once("Zend/XmlRpc/Client.php");
		@include_once("Zend/Http/Client.php");

		if (is_null($this->call_type))
		{
			if (@class_exists("Zend_XmlRpc_Client"))
			{
				$this->call_type = "rpc";
				$this->transport = "zend_xmlrpc_client";
			}
			elseif (function_exists("xmlrpc_encode"))
			{
				$this->call_type = "rpc";
				$this->transport = "xmlrpc_encode";
			}
			elseif (@class_exists("Zend_Http_Client"))
			{
				$this->call_type = "rest";
				$this->transport = "zend_http_client";
			}
			elseif (function_exists("curl_init") && function_exists("curl_exec"))
			{
				$this->call_type = "rest";
				$this->transport = "curl";
			}
			else
			{
				throw new Newsman_Client_Exception("No extensions found for the Newsman Api Client. Requires either Zend_XmlRpc_Client or xmlrpc_encode extension for RPC calls or Zend_Http_Client or CURL extension for REST calls.");
			}
		}
		elseif ($this->call_type == "rest")
		{
			if (@class_exists("Zend_Http_Client"))
			{
				$this->call_type = "rest";
				$this->transport = "zend_http_client";
			}
			elseif (function_exists("curl_init") && function_exists("curl_exec"))
			{
				$this->call_type = "rest";
				$this->transport = "curl";
			}
			else
			{
				throw new Newsman_Client_Exception("No extensions found for the Newsman Api Client. Requires either Zend_XmlRpc_Client or xmlrpc_encode extension for RPC calls or Zend_Http_Client or CURL extension for REST calls.");
			}
		}
		elseif ($this->call_type == "rpc")
		{
			if (@class_exists("Zend_XmlRpc_Client"))
			{
				$this->call_type = "rpc";
				$this->transport = "zend_xmlrpc_client";
			}
			elseif (function_exists("xmlrpc_encode"))
			{
				$this->call_type = "rpc";
				$this->transport = "xmlrpc_encode";
			}
			else
			{
				throw new Newsman_Client_Exception("No extensions found for the Newsman Api Client. Requires either Zend_XmlRpc_Client or xmlrpc_encode extension for RPC calls or Zend_Http_Client or CURL extension for REST calls.");
			}
		}
	}
	
	/**
	 * Sets the transport
	 * @param string $transport
	 */
	public function setTransport($transport)
	{
		$this->transport = $transport;
	}

	/**
	 * Sets the call type
	 * @param string $call_type
	 */
	public function setCallType($call_type)
	{
		$this->call_type = $call_type;
		$this->_detectTransport();
	}
	
	/**
	 * Updates the API URL - no trailing slash please
	 * @param string $api_url
	 */
	public function setApiUrl($api_url)
	{
		$this->api_url = $api_url;
	}

	/**
	 * Updates the API version
	 * @param string $api_version
	 */
	public function setApiVersion($api_version)
	{
		$this->api_version = $api_version;
	}
	
	/**
	 * Set the output format: json and ser (php serialize) accepted
	 * @param string $output_format
	 */
	public function setOutputFormat($output_format)
	{
		$this->output_format = $output_format;
	}
	
	public function __get($name)
	{
		$this->method_namespace = $name;
		return $this;
	}
	
	/**
	 * Set the namespace
	 * @param string $output_format
	 */
	public function setNamespace($namespace)
	{
		$this->method_namespace = $namespace;
	}
	
	public function __call($name, $params)
	{
		if (is_null($this->method_namespace)) throw new Newsman_Client_Exception("No namespace defined");
		
		$this->method_name = $name;
		
		$v_params = array();
		for ($i = 0; $i < count($params); $i++)
		{
			$k = "__".$i."__";
			$v_params[$k] = $params[$i];
		}

		if ($this->call_type == "rpc")
		{
			$ret = $this->sendRequestRpc($this->method_namespace . "." . $name, $params);
		}
		elseif ($this->call_type == "rest")
		{
			$ret = $this->sendRequestRest($this->method_namespace . "." . $name, $v_params);
		}
		else
		{
			throw new Newsman_Client_Exception("Unknown call type: $this->call_type");
		}

		// reset
		$this->method_namespace = null;
		return $ret;
	}
	
	public function encodeParams($params)
	{
		$ret = array();
		
		while(list($k, $v) = @each($params))
		{
			$k = $k.""; // make it string
			if (is_numeric($v) || is_string($v)) $ret[$k] = $v.""; // always string
			else $ret[$k] = json_encode($v);
		}
		
		return $ret;
	}
	
	public function sendRequestRpc($api_method, $api_params)
	{
		$api_url = sprintf("%s/%s/xmlrpc/%s/%s", $this->api_url, $this->api_version, $this->user_id, $this->api_key);
		
		if ($this->transport == "zend_xmlrpc_client")
		{
			$ret = $this->_rpc_Zend($api_url, $api_params);
		} elseif ($this->transport == "xmlrpc_encode")
		{
			$ret = $this->_rpc_xmlrpc($api_url, $api_params);
		} else
		{
			// should never reach this unless setTransport is called with weird transport name
			throw new Newsman_Client_Exception("Zend_XmlRpc_Client or xmlrpc_encode extension are required to make the POST RPC call.");
		}

		return $ret;
	}
	
	public function sendRequestRest($api_method, $params)
	{
		$api_method_url = sprintf("%s/%s/rest/%s/%s/%s.%s", $this->api_url, $this->api_version, $this->user_id, $this->api_key, $api_method, $this->output_format);

		$api_params = $this->encodeParams($params);

		if ($this->transport == "zend_http_client")
		{
			$ret = $this->_post_Zend($api_method_url, $api_params);
		} elseif ($this->transport == "curl")
		{
			$ret = $this->_post_curl($api_method_url, $api_params);
		} else
		{
			// should never reach this unless setTransport is called with weird transport name
			throw new Newsman_Client_Exception("Zend_Http_Client or curl extension are required to make the POST REST call.");
		}
		
		if ($this->output_format == "json")
		{
			$ret = json_decode($ret, true);
		} else
		if ($this->output_format == "ser")
		{
			$ret = unserialize($ret);
		} else
		{
			throw new Newsman_Client_Exception("Unknown serialization format: $this->output_format");
		}
		
		// check for errors
		if (is_array($ret))
		{
			if (isset($ret["err"]) && ($ret["err"] === "true" || $ret["err"] === true))
			{
				throw new Newsman_Client_Exception($ret["message"], $ret["code"]);
			}
		}
		
		return $ret;
	}
	
	protected function _rpc_Zend($url, $params)
	{
		@include_once("Zend/XmlRpc/Client.php");
		
		$client = new Zend_XmlRpc_Client($url);
		try
		{
			$ret = $client->call($this->method_namespace . "." . $this->method_name, $params);
		}
		catch (Exception $e)
		{
			throw new Newsman_Client_Exception($e->getMessage());
		}
		return $ret;
	}

	protected function _rpc_xmlrpc($url, $params)
	{
		$request = xmlrpc_encode_request($this->method_namespace . "." . $this->method_name, $params, array("encoding" => "UTF-8", "escaping" => "markup"));

		$context = stream_context_create(
			array(
				'http' => array(
					'method'  => "POST",
					'header'  => "Content-Type: text/xml",
					'content' => $request
				)
			)
		);

		$file = file_get_contents($url, false, $context);
		$response = xmlrpc_decode($file);

		if (!$response)
		{
			throw new Newsman_Client_Exception("Could not make the RPC call");
		}

		if (xmlrpc_is_fault($response))
		{
			throw new Newsman_Client_Exception("Error on the RPC call: " . $response["faultString"]);
		}

		return $response;
	}
	
	protected function _post_Zend($url, $params)
	{
		@include_once("Zend/Http/Client.php");
		
		$client = new Zend_Http_Client($url,
							array(
								"maxredirects" => 0,
								"timeout"      => 30
							)
					);
		
		$client->setMethod("POST");
		
	  while(list($k, $v) = @each($params))
		{
			$client->setParameterPost($k, $v);
		}		
		
		$response = $client->request();
		return $response->getBody();
	}
	
	protected function _post_curl($url, $params)
	{
		$cu = curl_init();
		curl_setopt($cu, CURLOPT_URL, $url);
		curl_setopt($cu, CURLOPT_POST, true); 
		if (preg_match("/^https/is", $url)) 
		{
			curl_setopt($cu, CURLOPT_PORT, 443);
		}
		
		curl_setopt($cu, CURLOPT_POSTFIELDS, $params);
		curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
		
		$ret = curl_exec($cu);
		$http_status = curl_getinfo($cu, CURLINFO_HTTP_CODE);
		if ($http_status != 200)
		{
			throw new Newsman_Client_Exception(
				sprintf("Error calling method. Got HTTP error code: %s and error message: %s", (string) $http_status, (string) curl_error($cu)),
				$http_status
			);
		}
		
		return $ret;
	}
}
?>