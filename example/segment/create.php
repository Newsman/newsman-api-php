<?php
// @see: http://kb.newsman.ro/api/1.2/segment.create
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->segment->create($list_id, $segment_name);

if (!is_numeric($ret))
{
	// handle error here
	die("Error on method segment.create");
}
?>