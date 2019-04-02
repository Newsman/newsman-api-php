<?php
// @see: https://kb.newsman.ro/api/1.2/list.setModerators
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->list->setModerators(
		$list_id,
		$moderators /* Array with one email per array item */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>