<?php

include('../DBBaseTable.php');
$t = new DBBaseTable("goods");

$goodsid ="5A5C23BB387A4A69A145CBD6F30DF12B";

$result = $t->query_by_id($goodsid);
print_r(array_values($result));

$t = new DBBaseTable("photo");
$photores = $t->query_by_field("goodsid",$goodsid);

print_r(array_values($photores));

?>