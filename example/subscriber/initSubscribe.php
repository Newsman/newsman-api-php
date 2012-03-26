<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.initSubscribe
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->initSubscribe($list_id, "you@yourdomain.com", "My firstname", "My lastname", "1.2.3.4", array("gender" => "male", "location" => "Romania", "age" => "29"), $options);

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.initSubscribe");
}
?>