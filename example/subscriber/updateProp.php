<?php
// @see: http://kb.newsman.ro/api/1.2/subscriber.updateProp 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->subscriber->updateProp(
	$subscriber_id, /* The subscriber id */ 
	$prop_name, /* Property name */ 
	$prop_value /* Property value */ 
);

if ($ret !== true)
{
	// handle error here
	die("Error on method subscriber.updateProp");
}
?>