<?php
// @see: http://kb.newsman.ro/api/1.2/newsletter.sendConfirm 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->newsletter->sendConfirm(
	$newsletter_id
);

if ($ret !== true)
{
	// handle error here
	die("Error on method newsletter.sendConfirm");
}
?>