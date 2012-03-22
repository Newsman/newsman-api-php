<?php
// @see: http://kb.newsman.ro/api/1.2/template.mailTemplateUpdate
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->template->mailTemplateUpdate($template_id, $list_id, $type, $subject, $text, $html);

if ($ret == "")
{
	// handle error here
	die("Error on method template.mailTemplateUpdate");
}
?>