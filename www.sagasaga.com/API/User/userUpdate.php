<?php

// This is a API, for user register
// chou
// 2015/8/26
include('../DBBaseTable.php');

//session

//

$t = new DBBaseTable("User"); //comments is table name

//session kara uid
$uid = "63FC03CB97A243E49B1A4AE0B879978A";
//


$array = array(
		"email" => $_POST["email"],
		"name" => $_POST["name"],
		"sex" => $_POST["sex"],
		"age" => $_POST["age"],
		"password" => md5($_POST["passwword"]),
		"address" => $_POST["address"],
);

$t->update_with_array($uid, $array);

?>
