<?php
// @see: http://kb.newsman.ro/api/1.2/import.csv 
// you can get your API KEY and your newsman_user_id from My account -> API
require_once("Newsman/Client.php");

$client = new Newsman_Client($newsman_user_id, $api_key);
$ret = $client->import->csv(
	$list_id, /* The list id */
	$segments, /* Array of segment ids where the users should be added too */
	$csv_data /* The source of the CSV file (comma separated)
 - Must be UTF-8 encoded
	- CSV data should be delimited by comma only (,)
 - CSV data can be enclosed in "
 - first ROW of CSV data is the header of the file. Required header is: email. Optional suggeste headers: firstname,lastname,ip. 
   Any other header will be used to save the data to the subscriber. Saved data can be used when building segments.
 Note: CSV data can have max 10000 rows. Max header columns: 50. Max size of data: 5MB. */
);

if ($ret == "")
{
	// handle error here
	die("Error on method import.csv");
}
?>