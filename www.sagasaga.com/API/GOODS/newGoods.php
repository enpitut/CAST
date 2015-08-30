<?php
session_start();

include ('../DBBaseTable.php');

$userID = '';
$category = '';
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
// else{
// 	if not signed in, redirect to login.html
// 	header("Location: ../../index/login.html"); /* Redirect browser */
// 	exit();
// }

if(isset($_POST['category'])){
	$category = $_POST['category'];
}

if(isset($_POST['photos'])){
	$photos = $_POST['photos'];
}

if(isset($_POST['description'])){
	$description = $_POST['description'];
}

if(strlen($title) > 0 &&
		strlen($category) > 0 &&
		strlen($userID) > 0){

			$t_goods = new DBBaseTable("goods");

			$array = array (
					"title" => $title,
					"category" => $category,
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
