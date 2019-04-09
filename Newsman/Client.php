<?php

class Newsman_Client
{
	/**
	 * The API URL
	 * @var string
	 */
	protected $api_url = "https://ssl.newsman.app/api";

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
	 * Output format: json or ser (php serialize)
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
	 * Newsman V2 REST API - Client
	 * @param $user_id string
	 * @param $api_key string
	 */
	public function __construct($user_id, $api_key)
	{
		$this->user_id = $user_id;
		$this->api_key = $api_key;

		$this->_initCurl();
	}

	/**
	 * Initialize curl
	 */
	protected function _initCurl()
	{
		if (function_exists("curl_init") && function_exists("curl_exec"))
		{
		} else
		{
			throw new Newsman_Client_Exception("No extensions found for the Newsman Api Client. Requires CURL extension for REST calls.");
		}
	}

	/**
	 * Deprecated
	 * @param string $transport
	 */
	public function setTransport($transport)
	{

	}

	/**
	 * Deprecated
	 * @param string $call_type
	 */
	public function setCallType($call_type)
	{

	}

	/**
	 * Updates the API URL - no trailing slash please
	 * @param string $api_url
	 */
	public function setApiUrl($api_url)
	{
		$url = parse_url($api_url);

		if ($url['scheme'] != 'https')
		{
			throw new Newsman_Client_Exception("Protocol must be https");
		}

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

	/**Deprecated
	 * Set the output format: json and ser (php serialize) accepted
	 * @param string $output_format
	 */
	public function setOutputFormat($output_format)
	{

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
		if (is_null($this->method_namespace))
		{
			throw new Newsman_Client_Exception("No namespace defined");
		}

		$this->method_name = $name;
		
		$v_params = array();
		for ($i = 0; $i < count($params); $i++)
		{
			$k = "__" . $i . "__";
			$v_params[$k] = $params[$i];
		}
		
		$ret = $this->sendRequestRest($this->method_namespace . "." . $name, $v_params);

		// reset
		$this->method_namespace = null;
		return $ret;
	}
	
	public function sendRequestRest($api_method, $params)
	{
		$api_method_url = sprintf("%s/%s/rest/%s/%s/%s.%s", $this->api_url, $this->api_version, $this->user_id, $this->api_key, $api_method, $this->output_format);
		
		$ret = $this->_post_curl($api_method_url, $params);

		$ret = json_decode($ret, true);

		return $ret;
	}

	protected function _post_curl($url, $params)
	{
		$cu = curl_init();
		curl_setopt($cu, CURLOPT_URL, $url);
		curl_setopt($cu, CURLOPT_POST, true);
		curl_setopt($cu, CURLOPT_PORT, 443);

		//curl_setopt($cu, CURLOPT_POSTFIELDS, $params);
		curl_setopt($cu, CURLOPT_CUSTOMREQUEST, "POST");  	
		curl_setopt($cu, CURLOPT_POST, true);
		curl_setopt($cu, CURLOPT_POSTFIELDS, json_encode($params));
		curl_setopt($cu, CURLOPT_HTTPHEADER, array('application/json')); 		
		curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
		
		$ret = curl_exec($cu);				
		
		$http_status = curl_getinfo($cu, CURLINFO_HTTP_CODE);
		if ($http_status != 200)
		{
			$_error = @json_decode($ret, true);

			if (is_array($_error) && array_key_exists("err", $_error) && array_key_exists("message", $_error) && array_key_exists("code", $_error))
			{
				throw new Newsman_Client_Exception(
					$_error["message"], $_error["code"]
				);
			} else
			{
				throw new Newsman_Client_Exception(
					(string)curl_error($cu), (string)$http_status
				);
			}
		}

		return $ret;
	}
}

class Newsman_Client_Exception extends Exception
{
	public function __construct($message, $code = 500)
	{
		parent::__construct($message, $code);
	}
}

?>
