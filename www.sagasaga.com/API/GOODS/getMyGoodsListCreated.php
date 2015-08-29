<?php
include('../DBBaseTable.php');

$userID = '';
if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(strlen($userID) == 0 && isset($_SESSION['CURRENT_USER_ID'])){
  $userID = $_SESSION['CURRENT_USER_ID'];
}

if (strlen($userID) > 0) {
	$t = new DBBaseTable("goods");
  $result = $t->query_by_field("userID",$userID);
  echo json_encode($result);
	exit;
}

echo '{"status":"error"}';
exit;
?>
