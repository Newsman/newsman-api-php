<?php
// @see: https://kb.newsman.ro/api/1.2/download.search
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

try
{
	$client = new Newsman_Client($newsman_user_id, $api_key);
	$ret = $client->download->search(
		$list_id,
		array(
			"subscribe_status" => $subscribe_status, /* 1 for subscribed, 0 for unsubscribed, default: 1 */
			"bounce_status" => $bounce_status, /* 1 for bounced, 0 for non bounced, default: 0 */
			"reported_spam" => $reported_spam, /* 1 for Yes, 0 for No, default: 0 */
			"inactivated_status" => $inactivated_status /* 1 for Yes, 0 for No, default: 0 (usually set for local erros or admin inactivations) */
		),
		array(
			"ips" => $ips, /* array of IPs from where the download is allowed */
			"expire_seconds" => $expire_seconds /* number of seconds until the link is valid (after it will expire, 404 ERROR), default: 3600 (1h) */
		)
	);
} catch (Exception $e)
{
	//handle exception here
}
?>