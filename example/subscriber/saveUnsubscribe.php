<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.saveUnsubscribe 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->saveUnsubscribe(
	$list_id, /* The list id */ 
	$email, /* Email address to be unsubscribed */ 
	$ip /* IP address of user unsubscribing */ 
);

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.saveUnsubscribe");
}
?>