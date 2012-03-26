<?php
// @see: http://kb.newsman.ro/api/1.2/segment.updateName
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->segment->updateName($segment_id, $segment_name);

if ($ret !== true)
{
	// handle error here
	die("Error on method segment.updateName");
}
?>