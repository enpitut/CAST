<?php
include('../DBBaseTable.php');

$goodsID = '';
if(isset($_POST['goodsID'])){
	$goodsID = $_POST['goodsID'];
}

if(strlen($goodsID) > 0){
  $t_reserve = new DBBaseTable("");
  $sql = "SELECT COUNT(*) AS 'sum' FROM reserve WHERE goodsID='" . $goodsID . "'";
	$result = $t_reserve->query($sql);

  echo json_encode($result);
  exit;
}

echo '{"status":"error"}';
exit;
?>
