<?php
// @see: https://kb.newsman.ro/api/1.2/newsletter.create
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->newsletter->create(
		$list_id, /* The list id */
		$html, /* The html content or false if no html present */
		$text, /* The text alternative or false if no text present */
		array(
			"encoding" => $encoding, /* the default encoding of this newsletter (default utf-8). optional */
			"subject" => $subject /* the newsletter subject. will be encoding using encoding. required */
		)
	);
} catch (Exception $e)
{
	//handle exception here
}
?>