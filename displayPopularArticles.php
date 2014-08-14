<?php
$isp = "";
$number_of_display = 20;

include ('./connectDB.php');

//$isp .= date();
global $contentData;

$isp .= "<div class = 'kadomaru' id = 'ranking'>";
$isp .= "<h3 id = 'rankingTitle'>人気記事</h3>";
$isp .= "<div id = 'rankingContent'>";
$isp .= "<ol>";

$sql = "SELECT * FROM articleInfoTable ORDER BY clickNo DESC, timestamp DESC";
$result = mysql_query($sql);
for ($i = 0; $i < $number_of_display; $i++) {
	if ($row = mysql_fetch_assoc($result)) {
		$fileName = "./contentData/";
		$fileName .= $row['titlefileName'];

		$title = file_get_contents($fileName);
		//$returnStr .= $contentData;
		$dispStr = "<li><a href = '" . $row['articleURL'] . "'>" . $title ."</a></li>";
		$isp .= $dispStr;
		$isp .= "";
	}
}

$isp .= "</ol>";
$isp .= "</div>";
$isp .= "</div>";

echo $isp;
?>
