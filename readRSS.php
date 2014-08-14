<?php

mb_language('Japanese');
require_once('./magpierss/rss_fetch.inc');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
require_once './magpierss/rss_fetch.inc';
// キャッシュは五分に設定
define("MAGPIE_CACHE_AGE", 60*10);
// キャッシュ保存ディレクトリ指定
define("MAGPIE_CACHE_DIR", "cache/");

include('./connectDB.php');

$minute = date('i');

if ($minute >= 52 || $minute < 7) {
	$sql = "SELECT rssURL FROM blogInfoTable WHERE blogNo MOD 4 = 0";
}else if ($minute >= 7 && $minute < 22) {
	$sql = "SELECT rssURL FROM blogInfoTable WHERE blogNo MOD 4 = 1";
}else if ($minute >= 22 && $minute < 37) {
	$sql = "SELECT rssURL FROM blogInfoTable WHERE blogNo MOD 4 = 2";
}else {
	$sql = "SELECT rssURL FROM blogInfoTable WHERE blogNo MOD 4 = 3";
}

$result = mysql_query($sql);
$num = mysql_num_rows($result);

$rssurl = array();

for ($i = 0; $i < $num; $i++) {
	if ($row = mysql_fetch_assoc($result)) {
		$rssurl[$i] = $row['rssURL'];
	}
}

//echo $minute .":". $sql;

//$rssurl = @file("./testdata.txt");

require('./createContent.php');

	include ('./connectDB.php');
	
	foreach($rssurl as $rurl) {
    		//最初の空白を除去！
    		$rurl = trim($rurl);
    		$rss = fetch_rss($rurl);
		//$blogTitle = $rss->channel['title'];
		$blogURL = $rss->channel['link'];
    		foreach($rss->items as $item) {
	       	 	//記事タイトル
        		$title = $item['title'];
        		//記事URL
        		$url = $item['link'];
        		//記事更新日時
			//$date_timestamp = $item['date_timestamp'];
			$date_timestamp = $item['dc']['date'];
        		$date = Date("[Y年m月d日]",$date_timestamp);
        		$date;
        	 
        		//記事内容
        		//$naiyo = $item['content'];
			//$naiyo;
			$content = $item["content"]["encoded"];
			$content;
			//$content = mb_convert_encoding($content, "UTF-8", "auto");
			
			
			//記事のURLがデータベースにあるかどうかを問い合わせる
			$sql = "SELECT * FROM articleInfoTable WHERE articleURL = '" . $url . "'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
			
			
			if ($num == 0) {
				//データベースへ登録
				
				$sql = "SELECT blogNo, blogTitle FROM blogInfoTable WHERE blogURL = '" . $blogURL . "'";
				$result = mysql_query($sql);
				$blogNo = 10000;
				$blogTitle = '';
				if ($row = mysql_fetch_assoc($result)) {
					$blogNo = $row['blogNo'];
					$blogTitle = $row['blogTitle'];
				}

				mysql_free_result($result);
				
				$sql = "SELECT max(articleNo) as maxNo FROM articleInfoTable";
				$result = mysql_query($sql);
				$articleNo = 0;
				if ($row = mysql_fetch_assoc($result)) {
					$articleNo = $row['maxNo'] + 1;
				}
				
				$content = createContent($blogTitle, $title, $url, $date_timestamp, $content);

				//タイトルファイル作成
				$title_name = './contentData/' . $articleNo . "T.txt";

				if (!file_exists($title_name)) {
					touch($title_name);
					chmod($title_name, 0755);
					file_put_contents($title_name, $title);
				}

				//コンテンツファイル作成
				$file_name = './contentData/' . $articleNo . ".txt";

				if (!file_exists($file_name)) {
					touch($file_name);
					chmod($file_name, 0755);
					file_put_contents($file_name, $content);
				}

				$sql = 'INSERT INTO articleInfoTable (articleNo, articleURL, titlefileName, contentfileName, timestamp, blogNo, clickNo) VALUES (NULL, "' . $url . '", "' . $articleNo . 'T.txt", "' . $articleNo . '.txt", "' .  $date_timestamp .  '", ' . $blogNo . ', 0)';
				mysql_query($sql)or die (mysql_error());
				
			}
       	 	 	
			mysql_free_result($result);
       			//ソート用の配列に挿入（配列のキーはタイムスタンプ型の更新日時）
			//$rssarray["{$date_timestamp}"]= $linkstr;
			//$rssarray["{$date_timestamp}"] = createContent($blogTitle, $title, $url, $date_timestamp, $content);
    		}
	}

?>
