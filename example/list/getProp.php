<?php
// @see: http://kb.newsman.ro/api/1.2/list.getProp
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->list->getProp($list_id, "from_email");

if ($ret == "")
{
	// handle error here
	die("Error on method list.getProp");
}
?>