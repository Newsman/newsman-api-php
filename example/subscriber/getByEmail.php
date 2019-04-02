<?php
// @see: https://kb.newsman.ro/api/1.2/subscriber.getByEmail
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->subscriber->getByEmail(
		$list_id, /* The list id */
		$email /* The email address */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>