<?php
// @see: https://kb.newsman.ro/api/1.2/newsletter.getProp
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->newsletter->getProp(
		$newsletter_id,
		$prop_name /* The property name. Allowed is any of: from_email - From Email, ex: newsletter@newsmanapp.com from_name - From Name, ex: Newsman Newsletter replyto_email - Reply To Email replyto_name - Reply To Name campaign_name - The campaign name (showed in the reports) */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>