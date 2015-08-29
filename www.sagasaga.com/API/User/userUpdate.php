<?php

// This is a API, for user register
// chou
// 2015/8/26
include('../DBBaseTable.php');

$userID = '';
if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(strlen($userID) == 0 && isset($_SESSION['CURRENT_USER_ID'])){
  $userID = $_SESSION['CURRENT_USER_ID'];
}

if(strlen($userID) > 0){
	$t_user = new DBBaseTable("user");

	$array = array();
	if(isset($_POST['email'])){
		$array['email'] = $_POST['email'];
	}
	if(isset($_POST['sex'])){
		$array['sex'] = $_POST['sex'];
	}
	if(isset($_POST['age'])){
		$array['age'] = $_POST['age'];
	}
	if(isset($_POST['password'])){
		$array['password'] = md5($_POST['password']);
	}
	if(isset($_POST['address'])){
		$array['address'] = $_POST['address'];
	}

	if($t_user->update_with_array($userID, $array)){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
?>
