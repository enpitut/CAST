<?php

include('../DBBaseTable.php');
$t = new DBBaseTable("goods");

$result = $t->query_by_nothing();
print_r(array_values($result));

?>