<?php

function createContent($blogTitle, $title, $url, $date_timestamp, $content) {
	/*
	$ary = $date_timestamp.split("+")[0];
	$ar = $ary.split("T");
	$ay = $ar[0].split("-");
	$date = $ay[0] . "年" . $ay[1] . "月" . $ay[2] . "日 " . $ar[1];
	 
	$da = $date_timestamp;
	$hen = strtotime("$da");
	//$date = date("Y" , $hen)."年".date("m", $hen)."月".date("d", $hen)."日 " .date("H", $hen) . ":".date("i", $hen) .":" .date("s", $hen);	*/
	$date = date("Y年m月d日 H:i:s", strtotime($date_timestamp));

	//表示用文字列セット
	$contentStr = "<div class = 'kadomaru' id = 'article'>";
	$contentStr .= "<p id = 'articleTitle'><a href = '" . $url ."'>" . $title . "</a></p>";
	$contentStr .= "<p id = 'articleDate'>". $date . "</p>";
	$contentStr .= "<div id = 'articleContent'>" . $content . "</div>";
	$contentStr .= "<p id = 'blogTitle'>" . $blogTitle . "</p>";
	$contentStr .= "</div>";
	
	return $contentStr;
}

?>
