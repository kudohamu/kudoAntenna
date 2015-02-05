<?php
$dbURL = "localhost";
$user = "root";
$pass = "root";
$db = "kudoAntennaDB";


$conn = mysql_connect($dbURL, $user, $pass);
mysql_select_db($db);
mysql_set_charset("utf8");
//mysql_query("SET NAMES UTF8");
?>
