<?php
// @see: http://kb.newsman.ro/api/1.2/import.csv
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);

$segments = array($segment_id_1, $segment_id_2); //or $segments = array(); or $segments = null
$csv_data = file_get_contents("import_data.csv"); //must be valid csv data, use comma (,) as delimiter

$ret = $client->import->csv($list_id, $segments, $csv_data);

if ($ret == "")
{
	// handle error here
	die("Error on method import.csv");
}
?>