<?php

echo "<div id = 'catagory'>";

$catagoryArray = array(0 => "すべて", 1 => "雑談", 2 => "ニュース", 3 => "スポーツ", 4 => "IT", 5 => "SS", 6 => "アニメ", 7 => "ゲーム");

for ($i = 0; $i < count($catagoryArray); $i++) {
	$prm = '';

	if ($i > 0) {
		$prm = '?prm=' . $i;
	}

	echo "<a id = 'catagoryLink' href = './index.php" . $prm . "' rel = 'internal'><div id = 'catagoryLinkDiv' name = 'catagoryN' value = '" . $i . "'><p>" . $catagoryArray[$i] . "</p></div></a>";
}

echo "</div>";
?>
