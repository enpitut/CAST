<?php
//get User Info BY uid
//created by Chou
//2015/8/27

include('../DBBaseTable.php');
$t = new DBBaseTable("User"); //comments is table names

//----------test------------
// Start the session
// session_start();
// $_SESSION["userid"] = "";
// $result = getUserInfo($_SESSION["userid"]);
// $_SESSION["username"] = $result[0];

$uid = "63FC03CB97A243E49B1A4AE0B879978A";

$result = $t->query_by_id($uid);

print_r(array_values($result));
echo json_last_error($result, TRUE);

//-------------------------
?>