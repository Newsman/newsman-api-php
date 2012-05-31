<?php
// @see: http://kb.newsman.ro/api/1.2/template.mailTemplateDel 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->template->mailTemplateDel(
	$template_id /* - The template ID to be removed */
);

if ($ret !== true)
{
	// handle error here
	die("Error on method template.mailTemplateDel");
}
?>