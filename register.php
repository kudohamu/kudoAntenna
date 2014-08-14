


<?php 
//
//
mb_language('Japanese');
require_once('./magpierss/rss_fetch.inc');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
require_once './magpierss/rss_fetch.inc';
// キャッシュは五分に設定
define("MAGPIE_CACHE_AGE", 60*10);
// キャッシュ保存ディレクトリ指定
define("MAGPIE_CACHE_DIR", "cache/");
$rssurl = array();
$rssurl = @file("./testdata.txt");

require('./createArticle.php');
 
//複数のRSSをまとめる配列
$rssarray = array();
 
foreach($rssurl as $rurl) {
    //最初の空白を除去！これを入れないとエラー出るよ！
    $rurl = trim($rurl);
    $rss = fetch_rss($rurl);
    $blogTitle = $rss->channel['title'];
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
         
        //ソート用の配列に挿入（配列のキーはタイムスタンプ型の更新日時）
	//$rssarray["{$date_timestamp}"]= $linkstr;
	$rssarray["{$date_timestamp}"] = createArticle($blogTitle, $title, $url, $date_timestamp, $content);
    }
}
//連想配列をキー（記事更新日時：タイムスタンプ型）で降順にソート
krsort($rssarray);
foreach($rssarray as $value) {
    echo $value;
}
?>

