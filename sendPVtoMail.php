<?php
include('./connectDB.php');

$adress = "kudolab.net@gmail.com";
$viewNo = 0; $reloadNo = 0; $clickNo = 0;
$tviewNo = 0; $treloadNo = 0; $tclickNo = 0;

$year = date('Y'); $month = date('m'); $day = date('d') - 1;

$sql = "SELECT ViewNo FROM viewInfoTable WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$viewNo = $row['ViewNo'];
}

$sql = "SELECT reloadNo FROM reloadInfoTable WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$reloadNo = $row['reloadNo'];
}

$sql = "SELECT clickNo FROM clickInfoTable WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$clickNo = $row['clickNo'];
}


$sql = "SELECT SUM(ViewNo) as sno FROM viewInfoTable WHERE Year = " . $year . " AND Month = " . $month;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$tviewNo = $row['sno'];
}

$sql = "SELECT SUM(reloadNo) as sno FROM reloadInfoTable WHERE Year = " . $year . " AND Month = " . $month;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$treloadNo = $row['sno'];
}

$sql = "SELECT SUM(clickNo) as sno FROM clickInfoTable WHERE Year = " . $year . " AND Month = " . $month;
$result = mysql_query($sql);
if ($row = mysql_fetch_assoc($result)) {
	$tclickNo = $row['sno'];
}

mb_internal_encoding("UTF-8");

$title = "くどアンテナ集計";

$message = "<p>". $year ."年" .$month ."月" .($day + 1) ."日<br/><br/>";
$message .= "<---昨日の集計---><br/>";
$message .= "ページビュー数：" .$viewNo ."回<br/>";
$message .= "リロード数：" .$reloadNo ."回<br/>";
$message .= "リンククリック数：" .$clickNo ."回<br/><br/>";
$message .= "<---今月の集計---><br/>";
$message .= "ページビュー数：" .$tviewNo ."回<br/>";
$message .= "リロード数：" .$treloadNo ."回<br/>";
$message .= "リンククリック数：" .$tclickNo ."回<br/></p>";

mail($adress, mb_encode_mimeheader($title, "ISO-2022-JP-MS"), mb_convert_encoding($message, "ISO-2022-JP-MS"), "Content-Type: text/html; charset=\"ISO-2022-JP\";\n");

?>
