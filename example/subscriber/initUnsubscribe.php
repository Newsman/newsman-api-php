<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.initUnsubscribe 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->initUnsubscribe(
	$list_id, /* The list id */ 
	$email, /* The email address of the subscriber */ 
	array(
		"template_id" => $template_id /* string|int with the specific template used for sending out the unsubscribe confirmation email */ 
	)
);

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.initUnsubscribe");
}
?>