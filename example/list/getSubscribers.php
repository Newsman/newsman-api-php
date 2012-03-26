<?php
// @see: http://kb.newsman.ro/api/1.2/list.getSubscribers
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->list->getSubscribers($list_id, "subscribed", "2012-01-01 12:30:00", 0, 50);

if (!is_array($ret))
{
	// handle error here
	die("Error on method list.getSubscribers");
}
?>