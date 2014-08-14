<?php
include ('./connectDB.php');

global $checkBoxValArray, $otherBoxValArray;

echo "<div class = 'kadomaru' id = 'settings'>";
echo "<h3 id = 'settingsTitle'>設定<h3>";

echo "<div id = 'settingsContent'>";

//表示ジャンル
echo "<h4 id = 'settingsSubTitle'>「TOP」で表示するジャンル</h4>";

echo "<form name = 'genreCheckBox'>";

echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '1' " . $otherBoxValArray[0] . ">雑談</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '2' " . $otherBoxValArray[1] . ">ニュース</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '3' " . $otherBoxValArray[2] . ">スポーツ</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '4' " . $otherBoxValArray[3] . ">IT</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '5' " . $otherBoxValArray[4] . ">SS</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '6' " . $otherBoxValArray[5] . ">アニメ</label><br/>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingGenreCheckBox' value = '7' " . $otherBoxValArray[6] . ">ゲーム</label><br/>";

echo "</form>";

//サイト別表示設定
echo "<br/><h4 id = 'settingsSubTitle'>サイト別表示設定</h4>";

echo "<form name = 'blogCheckBox'>";
echo "<div id = 'blogDiv'>";

$sql = "SELECT * FROM blogInfoTable";
$result = mysql_query($sql);
$num = mysql_num_rows($result);

for ($i = 0; $i < $num; $i++) {
	if ($row = mysql_fetch_assoc($result)) {
		echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingCheckBoxBlog' value = '" . $row['blogNo'] . "' " . $checkBoxValArray[$i] . ">" . $row['blogTitle'] . "</label><br/>";
	}
}

echo "</div>";
echo "</form>";
echo "<label><input type = 'button' id = 'allCheck' value = '全選択'></label>";
echo "<label><input type = 'button' id = 'allRelease' value = '全解除'></label>";

//その他機能
echo "<h4 id = 'settingsSubTitle'><br/>その他設定</h4>";
echo "<form name = 'otherCheckBox'>";
echo "<label id = 'settingsParts'><input type = 'checkbox' id = 'settingCheckBoxAnimate' value = 'animate' " . $otherBoxValArray[7] . ">リロードアニメーション</label><br/>";
echo "</form>";

echo "<p id = 'acp'>1ページの表示記事数</p>";

echo "<form name = 'acform'>";
echo "<select name='articleComb' id = 'articleComb'>";
if ($otherBoxValArray[8] == 5) {
	echo "<option value = '5' selected>5件</option>";
}else {
	echo "<option value = '5'>5件</option>";
}
if ($otherBoxValArray[8] == 10) {
	echo "<option value = '10' selected>10件</option>";
}else {
	echo "<option value = '10'>10件</option>";
}
if ($otherBoxValArray[8] == 15) {
	echo "<option value = '15' selected>15件</option>";
}else {
	echo "<option value = '15'>15件</option>";
}
if ($otherBoxValArray[8] == 20) {
	echo "<option value = '20' selected>20件</option>";
}else {
	echo "<option value = '20'>20件</option>";
}
if ($otherBoxValArray[8] == 30) {
	echo "<option value = '30' selected>30件</option>";
}else {
	echo "<option value = '30'>30件</option>";
}
if ($otherBoxValArray[8] == 40) {
	echo "<option value = '40' selected>40件</option>";
}else {
	echo "<option value = '40'>40件</option>";
}
if ($otherBoxValArray[8] == 50) {
	echo "<option value = '50' selected>50件</option>";
}else {
	echo "<option value = '50'>50件</option>";
}

echo "</select>";
echo "</form>";

echo "<p id = 'acformp'>表示形式</p>";
echo "<form name = 'dispTyp'>";
if ($otherBoxValArray[9] == 0) {
	echo "<label id = 'settingsParts'><input type = 'radio' name = 'dispType' checked>タイトル + 記事</label><br/>";
	echo "<label id = 'settingsParts'><input type = 'radio' name = 'dispType'>タイトルのみ</label><br/>";
}else {
	echo "<label id = 'settingsParts'><input type = 'radio' name = 'dispType'>タイトル + 記事</label><br/>";
	echo "<label id = 'settingsParts'><input type = 'radio' name = 'dispType' checked>タイトルのみ</label><br/>";
}
echo "</form>";

echo "<br/><label><input type = 'button' id = 'settingsButton' value = '設定'></label>";

echo "</div><!--settingsContent-->";
echo "</div><!--settings-->";

echo "<div class = 'kadomaru' id = 'settingsWarning'>";
echo "<div id = 'settingsWarningContent'>";

echo "<p>cookieが有効でない場合は設定が保存されないので注意してください。</p>";

echo "</div>";
echo "</div>";
?>
