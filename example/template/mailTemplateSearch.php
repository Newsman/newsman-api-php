<?php
// @see: http://kb.newsman.ro/api/1.2/template.mailTemplateSearch 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->template->mailTemplateSearch(
	$list_id, /* The list id to perform the search */ 
	$type /* The template id to perform the search by. Can be: unsubscribe_confirm - for unsubscribe mail confirmation content subscribe_confirm - for subscribe mail confirmation content all - any of the above */ 
);

if (!is_array($ret))
{
	// handle error here
	die("Error on method template.mailTemplateSearch");
}
?>