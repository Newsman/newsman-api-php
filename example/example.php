<?php
/**
 * Newsman Api Example - Howto connect / instantiate the client library
 * Please refer to the documentation for details on each namespace and method and see the detailed 
 * examples for more details.
 */

require_once("Newsman/Client.php");

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
?>