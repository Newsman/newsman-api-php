<?php
// @see: https://kb.newsman.ro/api/1.2/list.updateProp
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->list->updateProp(
		$list_id,
		$prop_name, /* The property name to be updated. Can be any of: from_email - From Email, ex: newsletter@newsmanapp.com from_name - From Name, ex: Newsman Newsletter replyto_email - Reply To Email replyto_name - Reply To Name list_secret - A list secret (password). Used in some hashes computation link_params_append - A query string of params which will be appended to every url. Default is: "utm_term=nl-link&utm_source=nl-general&utm_content=##abonat_id_tld##&utm_medium=newsletter&utm_campaign=Adevarul-Newsletter-##date##" send_rate_text - Text describing the send rate of a newsletter, ex: daily or every friday, ... after_unsubscribe_goto - Url where user is redirected after he clicks the ##NEWSMAN:list_unsubscribe## link */
		$prop_value
	);
} catch (Exception $e)
{
	//handle exception here
}
?>