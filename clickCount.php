<?php
/*
//不正アクセスを弾く
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest' || $_SERVER['HTTP_HOST'] != 'www.kudoAntenna') {

}
 */

include('./connectDB.php');
//require('./debug.php');

$link = $_GET['link'];
//$link = explode('/?/', $link)[0];

//debug($link);

$sql = "SELECT * FROM articleInfoTable WHERE articleURL = '" . $link ."'";
//debug($sql);
$result = mysql_query($sql);

//リンクが記事のものなら
if (mysql_num_rows($result) > 0) {
	$sql = "UPDATE articleInfoTable SET clickNo = clickNo + 1 WHERE articleURL = '" . $link ."'";
	//debug($sql);
	mysql_query($sql);

	$year = date('Y'); $month = date('m'); $day = date('d');

	$sql = "SELECT * FROM clickInfoTable WHERE Year = " . $year ." AND Month = " . $month . " AND Day = " . $day;
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if ($num == 0) {
		$sql = "INSERT INTO clickInfoTable VALUES(NULL, " . $year . ", " . $month . ", " . $day . ", 1) ";
		mysql_query($sql);
	}else {
		$sql = "UPDATE clickInfoTable SET clickNo = clickNo + 1 WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
		mysql_query($sql);
	}

}

?>
