<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.saveUnsubscribe
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->saveUnsubscribe($list_id, "you@yourdomain.com", "1.2.3.4");

if ($ret == "")
{
	// handle error here
	die("Error on method subscriber.saveUnsubscribe");
}
?>