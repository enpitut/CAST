<?php
//this a API for Reserve
//created by great.chou
//2015/8/28

include('../DBBaseTable.php');

// $userid = "7356C2A59B944E7FB3EE5CFD5297843C";
// $goodsid = "5A5C23BB387A4A69A145CBD6F30DF12B";

$userID = '';
$goodsID = '';
$reason = '';
if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(strlen($userID) == 0 && isset($_SESSION['CURRENT_USER_ID'])){
  $userID = $_SESSION['CURRENT_USER_ID'];
}

if(isset($_POST['goodsID'])){
	$goodsID = $_POST['goodsID'];
}

if(isset($_POST['reason'])){
	$reason = $_POST['reason'];
}

if(strlen($userID) > 0 && strlen($goodsID) > 0){
	$t = new DBBaseTable("reserve");

	$array = array(
			"reason" => $reason,
			"userID " => $userID,
			"goodsID" => $goodsID
	);

	$reserveID = $t->insert_with_array($array);

	if(strlen($reserveID) > 0){
		/* Or Redirect To Another Page */
		echo '{"status":"success", "reserveID":"' . $reserveID . '"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
?>
