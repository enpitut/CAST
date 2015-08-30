<?php
session_start();

include('../DBBaseTable.php');

$goodsID = '';
if(isset($_POST['goodsID'])){
	$goodsID = $_POST['goodsID'];
}

if(strlen($goodsID) > 0){
  $t_reserve = new DBBaseTable("");
  $sql = "SELECT COUNT(*) AS 'sum' FROM reserve WHERE goodsID='" . $goodsID . "'";
	$result = $t_reserve->query($sql);

	if(count($result) > 0){
		echo '{"status":"success", "sum":"' . $result[0]['sum'] . '"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
?>
