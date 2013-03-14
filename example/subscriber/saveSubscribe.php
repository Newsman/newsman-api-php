<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.saveSubscribe 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->saveSubscribe(
	$list_id, /* The list id */ 
	$email, /* Email address of subscriber */ 
	$firstname, /* Firstname of subscriber, can be null. */ 
	$lastname, /* Lastname of subscriber, can be null. */ 
	$ip, /* IP address of subscriber */ 
	$props /* Hash array with props (can be later used to build segment criteria) */ 
);

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.saveSubscribe");
}
?>