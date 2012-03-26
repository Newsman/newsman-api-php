<?php
// @see: http://kb.newsman.ro/api/1.2/template.mailTemplateSearch
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->template->mailTemplateSearch($list_id, $type);

if (!is_array($ret))
{
	// handle error here
	die("Error on method template.mailTemplateSearch");
}
?>