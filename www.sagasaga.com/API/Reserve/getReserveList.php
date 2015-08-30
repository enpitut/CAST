<?php
session_start();

include('../DBBaseTable.php');

$goodsID = '';
if(isset($_POST['goodsID'])){
	$goodsID = $_POST['goodsID'];
}

if(strlen($goodsID) > 0){
  $t_reserve = new DBBaseTable("");
  $sql = "SELECT reserve.*, user.username FROM reserve, user WHERE goodsID='" . $goodsID . "' AND reserve.userID = user.uid";
	$result = $t_reserve->query($sql);

  echo json_encode($result);
  exit;
}

echo '{"status":"error"}';
exit;
?>
