<?php
// @see: https://kb.newsman.ro/api/1.2/segment.getSubscribers
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->segment->getSubscribers(
		$segment_id,
		$start, /* Optional for large lists. The page number to start. Defaults to first page (page = 0). */
		$limit /* Optional for large lists. The number of results to return per page. Defaults to 100. Upper limit is 1000. */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>