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

if (strlen($userID) > 0) {
	$t = new DBBaseTable("");
	$sql = "SELECT goods.* FROM goods,reserve WHERE goods.uid = reserve.goodsID and reserve.userID = '" . $userID . "'";
  $result = $t->query($sql);
  echo json_encode($result);
	exit;
}

echo '{"status":"error"}';
exit;
?>
