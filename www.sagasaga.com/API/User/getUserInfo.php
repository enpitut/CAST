<?php
session_start();

include('../DBBaseTable.php');

$userID = '';
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

if(strlen($userID) > 0){
  $t = new DBBaseTable("user");
  $result = $t->query_by_id($userID);
  echo json_encode($result);
  exit;
}

echo '{"status":"error"}';
exit;
?>
