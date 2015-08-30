<?php
include('../DBBaseTable.php');

$keyword = '';
$category = '';

if(isset($_POST['keyword'])){
	$keyword = $_POST['keyword'];
}

if(isset($_POST['category'])){
	$category = $_POST['category'];
}

if(strlen($keyword) > 0 && strlen($category) > 0){
	$t = new DBBaseTable("goods");
  $where = "title LIKE " . "'%" . $keyword . "%' AND category = '" . $category . "'";
  $result = $t->query_by_where($where);
  echo json_encode($result);
	exit;
}
elseif (strlen($keyword) > 0){
	$t = new DBBaseTable("goods");
  $where = "title LIKE " . "'%" . $keyword . "%'";
  $result = $t->query_by_where($where);
  echo json_encode($result);
	exit;
}
elseif (strlen($category) > 0) {
	$t = new DBBaseTable("goods");
  $result = $t->query_by_field("category",$category);
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
