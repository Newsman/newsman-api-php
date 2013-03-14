<?php
// @see: http://kb.newsman.ro/api/1.2/download.reported_spam 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->download->reported_spam(
	$list_id
);

if ($ret == "")
{
	// handle error here
	die("Error on method download.reported_spam");
}
?>