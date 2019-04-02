<?php
// @see: https://kb.newsman.ro/api/1.2/list.getProp
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->list->getProp(
		$list_id,
		$prop_name
	);
} catch (Exception $e)
{
	//handle exception here
}
?>