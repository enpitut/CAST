<?php
//this a API for Reserve
//created by great.chou
//2015/8/28

$t = new DBBaseTable("photo");
$photores = $t->query_by_field("goodsid",$goodsid);

print_r(array_values($photores));

?>