<?php

include ('./connectDB.php');

echo "<div class = 'kadomaru' id = 'linkSite'>";
echo "<h3 id = 'linkSiteTitle'>巡回サイト様</h3>";
echo "<div id = 'linkSiteContent'>";
echo "<ul>";

$sql = "SELECT * FROM blogInfoTable";
$result = mysql_query($sql);
$num = mysql_num_rows($result);

for ($i = 0; $i < $num; $i++) {
	if ($row = mysql_fetch_assoc($result)) {
		echo "<li><a href = '" . $row["blogURL"] . "'>" . $row["blogTitle"] . "</a></li>";
	}
}

echo "</ul>";
echo "</div>";
echo "</div>";

?>
