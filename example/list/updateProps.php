<?php
// @see: http://kb.newsman.ro/api/1.2/list.updateProps
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->list->updateProps($list_id, array("from_email" => "you@yourdomain.com", "from_name" => "My list name"));

if ($ret !== true)
{
	// handle error here
	die("Error on method list.updateProps");
}
?>