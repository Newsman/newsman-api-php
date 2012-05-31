<?php
// @see: http://kb.newsman.ro/api/1.2/newsletter.all 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->newsletter->all(
	$list_id,
	$start_date,
	$stop_date,
	$status /* Status of newsletter can be:
  0 - unconfirmed (new)
  1 - confirmed
  2 - sending
  3 - paused
  4 - resumed sending
  5 - sent (finished)
  If status is false all newsletters are returned */
);

if (!is_array($ret))
{
	// handle error here
	die("Error on method newsletter.all");
}
?>