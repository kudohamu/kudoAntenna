<?php

$checkBoxValArray = array();
$otherBoxValArray = array();

include('./connectDB.php');
$sql = "SELECT blogNo FROM blogInfoTable";
$num = @mysql_num_rows(@mysql_query($sql));

if ($_COOKIE['kudoAntennaCheckBox'] != '') {
	$cookieArray = explode('#', $_COOKIE['kudoAntennaCheckBox']);
	//print_r ($cookieArray);
	$anum = count($cookieArray);

	for ($i = 0; $i < $num; $i++) {
		if($i < $anum) {
			$checkBoxValArray[$i] = $cookieArray[$i];
		}else {
			$checkBoxValArray[$i] = 'checked';
		}
	}
	//print_r($checkBoxValArray);
}else {
	
	for ($i = 0; $i < $num; $i++) {
		$checkBoxValArray[$i] = 'checked';
	}
}

if ($_COOKIE['kudoAntennaOtherBox'] != '') {
	$otherBoxValArray = explode('#', $_COOKIE['kudoAntennaOtherBox']);
	//print_r ($otheBoxValrArray);
	//print_r($checkBoxValArray);
}else {
	for ($i = 0; $i < 7; $i++) {
		$otherBoxValArray[$i] = "checked";
	}
	$otherBoxValArray[7] = "";
	$otherBoxValArray[8] = 10;
	$otherBoxValArray[9] = 0;
}

?>
