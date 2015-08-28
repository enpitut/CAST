<?php

// This is a API, for user register
// chou
// 2015/8/26
include('../DBBaseTable.php');

$t = new DBBaseTable("User"); //comments is table name

$array = array(
		"email" => $_POST["email"],
		"username" => $_POST["name"],
		"sex" => $_POST["sex"],
		"password" => md5($_POST["passwword"]),
	    "address" => $_POST["address"],
);

print_r(array_values($array));

$t->insert_with_array($array);

?>
