<?php

function form() {
	require_once('./contact.php');

	$returnStr3 = '';
	$returnStr3 .= '<div class = "kadomaru" id = "article">';
	$returnStr3 .= '<div id = "formDiv"><p id = "articleTitle">- お問い合わせ -</p></div>';
	$returnStr3 .= '<div id = "articleContent">';

	$returnStr3 .= contact();

	$returnStr3 .= '</div>';
	$returnStr3 .= '</div>';

	return $returnStr3;
}

?>
