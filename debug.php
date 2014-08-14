<?php

function debug($str) {
	//デバッグ用ファイル作成
	$file_name = './debug.txt';

	if (!file_exists($file_name)) {
		touch($file_name);
		chmod($file_name, 0755);
		file_put_contents($file_name, $str);
	}else {
		file_put_contents($file_name, $str);
	}

}

?>
