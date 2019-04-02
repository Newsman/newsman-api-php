<?php
// @see: https://kb.newsman.ro/api/1.2/newsletter.setSegments
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->newsletter->setSegments(
		$newsletter_id,
		$segment_ids /* Array of segments (one int per array item) */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>