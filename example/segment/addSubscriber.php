<?php
// @see: http://kb.newsman.ro/api/1.2/segment.addSubscriber
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->segment->addSubscriber($segment_id, $subscriber_id);

if ($ret !== true)
{
	// handle error here
	die("Error on method segment.addSubscriber");
}
?>