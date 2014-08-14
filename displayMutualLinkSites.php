<?php
$muStr = '';

include('./connectDB.php');

$muStr .= '<div class = "kadomaru" id = "mutualLinkSite">';
$muStr .= '<h3 id = "mutualLinkSiteTitle">リンクサイト</h3>';
$muStr .= '<div id = "mutualLinkSiteContent">';

$muStr .= "<a href = './?id=form' rel = 'internal'>相互リンク募集中！</a><br/>";
$muStr .= "<ul>";

$sql = "SELECT * FROM mutualBlogInfoTable";
$result = mysql_query($sql);
$num = mysql_num_rows($result);

for ($i = 0; $i < $num; $i++) {
	if ($row = mysql_fetch_assoc($result)) {
		$muStr .= "<li><a href = '" . $row["blogURL"] . "'> " . $row["blogName"] . "</a><br/></li>";
	}
}

$muStr .= "</ul>";
$muStr .= '</div>';
$muStr .= '</div>';

echo $muStr;
?>
