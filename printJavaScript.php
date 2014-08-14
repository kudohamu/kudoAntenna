<?php

function jprint($str) {
	
	return "document.write(" . $str . ");";

}

function printHeader() {
	echo "header('Content-type: application/x-javascript');";
}

?>
