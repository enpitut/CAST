<?php

// this a API for goods 登録
// cteated by great.chou
// 2015/8/28
include ('../DBBaseTable.php');

/*向GOODS表中插入数据  */
// $userID = "7356C2A59B944E7FB3EE5CFD5297843C";
// $catalogID = "7356C2A59B944E7FB3EE5CFD5297843C";
// $photos = '[{"path":"upload/111.jpg"},{"path":"upload/111.jpg"},{"path":"upload/111.jpg"}]';
// $title = "new goods";
// $description = "";

// test post param
// echo $_POST['title'];

$userID = '';
$catalog = '';
$photos = '';
$title = '';
$description = '';

if(isset($_POST['title'])){
	$title = $_POST['title'];
}

if(isset($_POST['userID'])){
	$userID = $_POST['userID'];
}

if(strlen($userID) == 0 && isset($_SESSION['CURRENT_USER_ID'])){
  $userID = $_SESSION['CURRENT_USER_ID'];
}

if(isset($_POST['catalog'])){
	$catalog = $_POST['catalog'];
}

if(isset($_POST['photos'])){
	$photos = $_POST['photos'];
}

if(isset($_POST['description'])){
	$description = $_POST['description'];
}

if(strlen($title) > 0 &&
		strlen($catalog) > 0 &&
		strlen($userID) > 0){

			$t_goods = new DBBaseTable("goods");

			$array = array (
					"title" => $title,
					"catalog" => $catalog,
					"userID" => $userID,
					"photos" => $photos,
					"description" => $description
			);

			$goodsID = $t_goods->insert_with_array($array);

			if(strlen($goodsID) > 0){
				/* Or Redirect To Another Page */
				echo '{"status":"success", "goodsID":"' . $goodsID . '"}';
				exit;
			}
		}

	echo '{"status":"error"}';
	exit;
?>
