<?php
// @see: https://kb.newsman.ro/api/1.2/subscriber.update
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->subscriber->update(
		$subscriber_id, /* The subscriber id */
		$email, /* The email address. If null, the email is unchanged otherwise valid email is required. */
		$firstname, /* Firstname of subscriber */
		$lastname /* Lastname of subscriber */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>