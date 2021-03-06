<?php
// @see: https://kb.newsman.ro/api/1.2/segment.removeSubscriber
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->segment->removeSubscriber(
		$segment_id,
		$subscriber_id
	);
} catch (Exception $e)
{
	//handle exception here
}
?>