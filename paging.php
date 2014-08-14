<?php 
include ('./connectDB.php');

$sql = 'SELECT count(articleNo) as maxNo FROM articleInfoTable';
$result = mysql_query($sql);
$maxArticleNo = 0;
if ($row = mysql_fetch_assoc($result)) {
	$maxArticleNo = $row['maxNo'];
}


echo '<div id = "pageing">';	
$limit = ceil($maxArticleNo / $number_of_content);
$page = empty($_GET["page"])? 1:$_GET["page"];
paging($limit, $page);
echo '</div>';


function paging($limit,$page,$disp=10){
	//$dispはページ番号の表示数
	$page = empty($_GET["page"])? 1:$_GET["page"];
  	$next = $page+1;//前のページ番号
	$prev = $page-1;//次のページ番号
   
	if($page != 1 ) {//最初のページ以外で「前へ」を表示
		echo '<p  id = "prePage"><a href="?page='.$prev.'" rel = "internal">&laquo; 前のページへ</a></p>';
	}
	if($page <$limit){//最後のページ以外で「次へ」を表示
		echo '<p id = "nextPage"><a href="?page='.$next.'" rel = "internal">次のページへ &raquo;</a></p>';
	}
   	/*確認用
	print "current:".$page."<br>";
	print "next:".$next."<br>";
	print "prev:".$prev."<br>";*/
}
?>
