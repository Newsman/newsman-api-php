<?php
// @see: http://kb.newsman.ro/api/1.2/newsletter.create
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->newsletter->create($list_id, $html, $text, array("subject" => "My subject", "encoding" => "UTF-8");

if (!is_numeric($ret))
{
	// handle error here
	die("Error on method newsletter.create");
}
?>