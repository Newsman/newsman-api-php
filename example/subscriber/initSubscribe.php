<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.initSubscribe 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->initSubscribe(
	$list_id, /* The list id */ 
	$email, /* The email address of subscriber */ 
	$firstname, /* Firstname of subscriber, can be null */ 
	$lastname, /* Lastname of subscriber, can be null. */ 
	$ip, /* IP address of subscriber. Will be overwritten when the subscriber confirms (clicks the unique link) */ 
	$props, /* Hash array with props */ 
	array(
		"segments" => $segments, /* array with segment ids where user will be added */ 
		"template_id" => $template_id /* string|int with the specific template used for sending out the confirmation email */ 
	)
);

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.initSubscribe");
}
?>