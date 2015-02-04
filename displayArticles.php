<?php
$returnStr = "";

include('./readRSS.php');
include('./readCookie.php');

global $otherBoxValArray, $cookieArray;


$number_of_content = $otherBoxValArray[8];

$page = empty($_GET["page"])? 1:$_GET["page"];
$prm = empty($_GET["prm"])? 0:$_GET["prm"];
$id = empty($_GET["id"])? "hoge":$_GET["id"];
//$returnStr .= $id;
if ($id == 'about') {
	require_once('./about.php');
	$returnStr .= about();
	//include('./sendPVtoMail.php');
}else if ($id == 'form') {
	//$returnStr .='ho';
	include('./form.php');
	$returnStr .= form();
}else {

	include('./connectDB.php');

	$year = date('Y'); $month = date('m'); $day = date('d');

	$sql = "SELECT * FROM reloadInfoTable WHERE Year = " . $year ." AND Month = " . $month . " AND Day = " . $day;
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if ($num == 0) {
		$sql = "INSERT INTO reloadInfoTable VALUES(NULL, " . $year . ", " . $month . ", " . $day . ", 1) ";
		mysql_query($sql);
	}else {
		$sql = "UPDATE reloadInfoTable SET reloadNo = reloadNo + 1 WHERE Year = " . $year . " AND Month = " . $month . " AND Day = " . $day;
		mysql_query($sql);
	}

	if ($otherBoxValArray[9] == 0) {
		$sql = "SELECT contentfileName FROM articleInfoTable, blogInfoTable WHERE articleInfoTable.blogNo = blogInfoTable.blogNo ";
	}else {
		$sql = "SELECT articleURL, titlefileName, timestamp, blogTitle, blogURL FROM articleInfoTable, blogInfoTable WHERE articleInfoTable.blogNo = blogInfoTable.blogNo ";
	}
	$condition = "";

	for ($i = 0; $i < count($cookieArray); $i++) {
		if ($cookieArray[$i] == "checked") {
			if ($condition == "") {
				$condition = "AND (";
			}else {
				$condition .= "OR ";
			}
			$condition .= "articleInfoTable.blogNo = " . $i . " ";
		}

		if ($i == count($cookieArray) - 1) $condition .= ") ";
	}

	if ($prm > 0) {
		$condition .= "AND kind = " . $prm . " ";
	}else {
		$condition2 = "";
		for ($i = 0; $i < 7; $i++) {
			if ($otherBoxValArray[$i] == "checked") {
				if ($condition2 == "") {
					$condition2 .= "AND (";
				}else {
					$condition2 .= "OR ";
				}
				$condition2 .= "kind = " . ($i + 1) . " ";
			}
		}
		$condition2 .= ") ";

		$condition .= $condition2;
	}

	$sql .= $condition . "ORDER BY timestamp DESC";
	$nsql = $sql . " LIMIT " . ($page - 1) * $number_of_content . "," . $number_of_content;

	//$returnStr .= $nsql;

	$result = mysql_query($nsql);

	if ( $otherBoxValArray[9] == 0) {
		for ($i = 0; $i < $number_of_content; $i++) {
			if ($row = @mysql_fetch_assoc($result)) {
				$fileName = "./contentData/";
				$fileName .= $row['contentfileName'];

				$contentData = file_get_contents($fileName);
				$returnStr .= $contentData;
			}
		}
	}else {
		$returnStr .= "<div class = 'kadomaru' id = 'article'><div id = 'articleContent'>
			<table id = 'articleTable'>
			<tr id = 'articleTr'>
			<th>時間</th>
			<th>記事タイトル</th>
			<th>ブログ名</th>
			</tr>";

		for ($i = 0; $i < $number_of_content; $i++) {
			$returnStr .= "<tr id = 'articleTr'>";
			if ($row = @mysql_fetch_assoc($result)) {
				$fileName = "./contentData/";
				$fileName .= $row['titlefileName'];

				$titleData = file_get_contents($fileName);
				$returnStr .= "<td id = 'dateTd'>" . date('H:i', strtotime($row['timestamp'])) . "</td>";
				$returnStr .= "<td id = 'titleTd'><a href = '" . $row['articleURL'] . "'>" . $titleData . "</a></td>";
				$returnStr .= "<td id = 'blogTd'><a href = '" . $row['blogURL'] . "'>" . $row['blogTitle'] . "</td>";
			}
			$returnStr .= "</tr>";
		}
		$returnStr .= "</table></div></div>";
	}


	//$returnStr .= $sql;

	$result = mysql_query($sql);
	$maxArticleNo = @mysql_num_rows($result);

	$returnStr .= '<div id = "pageing">';	
	$limit = ceil($maxArticleNo / $number_of_content);
	$next = $page+1;//前のページ番号
	$prev = $page-1;//次のページ番号
   
	if($page != 1 ) {//最初のページ以外で「前へ」を表示
		if ($prm == 0) {
			$returnStr .= '<p  id = "prePage"><a href="?page='.$prev.'" rel = "internal">&laquo; 前のページへ</a></p>';
		}else {
			$returnStr .= '<p  id = "prePage"><a href="?prm='.$prm.'&page='.$prev.'" rel = "internal">&laquo; 前のページへ</a></p>';
		}
	
	}
	if($page <$limit){//最後のページ以外で「次へ」を表示
		if ($prm == 0) {
			$returnStr .= '<p id = "nextPage"><a href="?page='.$next.'" rel = "internal">次のページへ &raquo;</a></p>';
		}else {
			$returnStr .= '<p id = "nextPage"><a href="?prm='.$prm.'&page='.$next.'" rel = "internal">次のページへ &raquo;</a></p>';
		}
		
	}
	$returnStr .= '</div>';

}

echo $returnStr;

?>
