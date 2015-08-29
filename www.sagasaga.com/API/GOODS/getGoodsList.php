<?php
include('../DBBaseTable.php');

$keyword = '';
$catalog = '';
$userID = '';

if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(isset($_POST['keyword'])){
	$keyword = $_POST['keyword'];
}

if(isset($_POST['catalog'])){
	$catalog = $_POST['catalog'];
}

if(strlen($keyword) > 0){
	$t = new DBBaseTable("goods");
  $where = "title LIKE " . "'%" . $keyword . "%'";
  $result = $t->query_by_where($where);
  echo json_encode($result);
	exit;
}
elseif (strlen($catalog) > 0) {
	$t = new DBBaseTable("goods");
  $result = $t->query_by_field("catalog",$catalog);
  echo json_encode($result);
	exit;
}
elseif (strlen($userID) > 0) {
	$t = new DBBaseTable("goods");
  $result = $t->query_by_field("userID",$userID);
  echo json_encode($result);
	exit;
}
else{
	$t = new DBBaseTable("goods");
  $result = $t->query_by_nothing();
  echo json_encode($result);
	exit;
}

echo '{"status":"error"}';
exit;
?>
