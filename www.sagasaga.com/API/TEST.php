<?php
include('DBBaseTable.php');

/* EXAMPLE */
$t = new DBBaseTable("comments"); //comments is table name

//SELECT
//SELECT WITH ID
$result = $t->query_by_id("123");
while($item = array_shift($result))
{
    foreach ($item as $key => $value)
    {
        echo $key.' => '.$value."\n";
    }
}


  //UPDATE
  $arr=array("PosterName"=>"37","Title"=>"333");
  echo $t->update_with_array("123", $arr);

  //INSERT
  $arr=array("PosterName"=>"37","Title"=>"18181","Content"=>"hahah");
  echo $t->insert_with_array($arr);
 ?>
