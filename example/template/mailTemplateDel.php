<?php
// @see: https://kb.newsman.ro/api/1.2/template.mailTemplateDel
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->template->mailTemplateDel(
		$template_id /* - The template ID to be removed */
	);
} catch (Exception $e)
{
	//handle exception here
}
?>