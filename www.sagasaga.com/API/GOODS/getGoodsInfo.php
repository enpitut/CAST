<?php

include('../DBBaseTable.php');
$t = new DBBaseTable("goods");

// $goodsID ="5A5C23BB387A4A69A145CBD6F30DF12B";

$goodsID = '';
if(isset($_POST['goodsID'])){
	$goodsID = $_POST['goodsID'];
}

if(strlen($goodsID) > 0){
  $result = $t->query_by_id($goodsID);
  echo json_encode($result);
  exit;
}

echo '{"status":"error"}';
exit;
?>
