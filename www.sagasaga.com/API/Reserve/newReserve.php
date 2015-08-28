<?php
//this a API for Reserve
//created by great.chou
//2015/8/28

$userid = "7356C2A59B944E7FB3EE5CFD5297843C";
$goodsid = "5A5C23BB387A4A69A145CBD6F30DF12B";

$t = new DBBaseTable("reserve");

$array = array(
		"reason" => $_POST["reason"],
		"userid " => $userid,
		"goodsid" => $goodsid
);

$t->insert_with_array($array);

?>