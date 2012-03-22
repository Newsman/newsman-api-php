<?php
// @see: http://kb.newsman.ro/api/1.2/newsletter.schedule
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->newsletter->schedule($newsletter_id, "2012-01-01 12:30:00");

if ($ret !== true)
{
	// handle error here
	die("Error on method newsletter.schedule");
}
?>