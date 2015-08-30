<?php
session_start();

include('../DBBaseTable.php');

$array = array();
if(isset($_POST['username'])){
	$array['username'] = $_POST['username'];
}
if(isset($_POST['password'])){
	$array['password'] = md5($_POST['password']);
}
if(isset($_POST['email'])){
	$array['email'] = $_POST['email'];
}
if(isset($_POST['sex'])){
	$array['sex'] = $_POST['sex'];
}
if(isset($_POST['address'])){
	$array['address'] = $_POST['address'];
}
if(isset($_POST['avatar'])){
	$array['avatar'] = $_POST['avatar'];
}

if(count($array) > 0){
	$t_user = new DBBaseTable("user");

	$userID = $t_user->insert_with_array($array);
	if(strlen($userID) > 0){
		$_SESSION['CURRENT_USER_ID'] = $userID;
		$_SESSION['CURRENT_USER'] = $_POST['username'];

		echo '{"status":"success", "userID":"' . $userID . '"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
?>
