<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.updateProps 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->updateProps(
	$subscriber_id, /* The subscriber id */
	$props /* Hash array with props (k = v) */
);

if ($ret !== true)
{
	// handle error here
	die("Error on method subscriber.updateProps");
}
?>