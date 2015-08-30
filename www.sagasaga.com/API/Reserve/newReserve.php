<?php
session_start();

include('../DBBaseTable.php');

$userID = '';
$goodsID = '';
$reason = '';
if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(strlen($userID) == 0 && isset($_SESSION['CURRENT_USER_ID'])){
  $userID = $_SESSION['CURRENT_USER_ID'];
}
// else{
// 	if not signed in, redirect to login.html
// 	header("Location: ../../index/login.html"); /* Redirect browser */
// 	exit();
// }

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
