<?php
// @see: http://kb.newsman.ro/api/1.2/newsletter.updateProps 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->newsletter->updateProps(
	$newsletter_id,
	array(
		"from_email" => $from_email, /*  From Email, ex: newsletter@newsmanapp.com*/
		"from_name" => $from_name, /*  From Name, ex: Newsman Newsletter*/
		"replyto_email" => $replyto_email, /*  Reply To Email*/
		"replyto_name" => $replyto_name, /*  Reply To Name*/
		"campaign_name" => $campaign_name /*  The campaign name (showed in the reports)*/
	)
);

if ($ret !== true)
{
	// handle error here
	die("Error on method newsletter.updateProps");
}
?>