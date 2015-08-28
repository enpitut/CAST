<?php
// This is a API, for user register
// chou
// 2015/8/26
include('../DBBaseTable.php');
$t = new DBBaseTable("User");

 $name = $_POST ["name"];
 $password = md5($_POST ["passwword"]);

$result = $t->query_by_field ( "username" , $name);

if(count($result) > 0){
	print_r(array_values($result));
}

print_r($result[0]['password']);

if ($result[0]['password'] === $password) {
 	// longin sucess
 	print_r("chenggongla waaa");
 } else {
 	// login
 	print_r("***shibaile***");
 }

?>