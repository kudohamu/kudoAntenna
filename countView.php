<?php
include ('./connectDB.php');

$year = date('Y'); $month = date('m'); $day = date('d');

$sql = "SELECT * FROM viewInfoTable WHERE Year = " . $year ." AND Month = " . $month . " AND Day = " . $day;
$result = mysql_query($sql);
$num = mysql_num_rows($result);

if ($num == 0) {
	$sql = "INSERT INTO viewInfoTable VALUES(NULL, " . $year . ", " . $month . ", " . $day . ", 1) ";
	mysql_query($sql);
}else {
	$sql = "UPDATE viewInfoTable SET viewNo = viewNo + 1 WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
	mysql_query($sql);
}
?>
