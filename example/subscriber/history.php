<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.history 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->history(
	$subscriber_id
);

if (!is_array($ret))
{
	// handle error here
	die("Error on method subscriber.history");
}
?>