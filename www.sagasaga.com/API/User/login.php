<?php
// This is a API, for user register
// chou
// 2015/8/26
include('../DBBaseTable.php');

 $username = '';
 $password = '';
 if(isset($_POST['username'])){
 	$username = $_POST['username'];
 }
 if(isset($_POST['password'])){
 	$password = $_POST['password'];
 }

 if(strlen($username) > 0 && strlen($password) > 0){
   $t = new DBBaseTable("User");
   $result = $t->query_by_field ( "username" , $username);

   if(count($result) > 0){
     if ($result[0]['password'] === md5($password)) {
      	// longin sucess
      	// print_r("chenggongla waaa");
        $_SESSION['CURRENT_USER_ID'] = $result[0]['uid'];
        $_SESSION['CURRENT_USER'] = $result[0]['username'];
        
        echo '{"status":"success"}';
        exit;
      } else {
      	// login
      	// print_r("***shibaile***");
        echo '{"status":"error", "message":"password error"}';
        exit;
      }
   }
 }

// print_r($result[0]['password']);
echo '{"status":"error"}';
exit;


?>
