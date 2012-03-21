<?
/**
 * Newsman Api Example
 * Please refer to the documentation for details on each namespace and method
 */

require_once("Newsman/Client.php");
require_once("Newsman/Client/Exception.php");

/**
 * Newsman User Id
 * @var int
 */
$newsman_user_id = 999999;

/**
 * The API key, obtained from Newsman Control Panel
 * @var string
 */
$api_key = "********************************";

/**
 * The Newsman API Client
 * @var Newsman_Client
 */
$client = new Newsman_Client($newsman_user_id, $api_key);

/**
 * How to make the api call: rpc or rest
 * Default is rpc
 * Autodetected by default, uncomment for specific value
 */
//$client->setCallType("rpc");

/**
 * Transport used for the api call, default is zend_xmlrpc_client
 * Possible values for RPC calls: zend_xmlrpc_client or xmlrpc_encode
 * Possible values for REST calls: zend_http_client or curl
 * Default is zend_xmlrpc_client
 * Autodetected by default, uncomment for specific value
 */
//$client->setTransport("zend_xmlrpc_client");

/**
 * Example call for adding a email template (subscribe or unsubscribe)
 */
$ret = $client->template->mailTemplateAdd($list_id, "subscribe_confirm", "[Enter subject here]", "[Enter plaintext here]", "[Enter html here]");

/**
 * Example call for updating a subscriber's properties
 */
$ret = $client->subscriber->updateProps($subscriber_id, array("key_1" => "value_1", "key_2" => "value_2", "key_n" => "value_n"));

/**
 * Example call for creating a newsletter
 */
$ret = $client->newsletter->create($list_id, "[Enter HTML content here]", "[Enter plaintext content here]", array("subject" => "[Enter subject here]", "encoding" => "utf-8"));
?>