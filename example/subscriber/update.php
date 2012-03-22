<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.update
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->update($subscriber_id, "you@yourdomain.com", "My firstname", "My lastname");

if ($ret !== true)
{
	// handle error here
	die("Error on method subscriber.update");
}
?>