<?php
//get data posted by ajax(JSON)
$post_data = $_POST['Post_Data'];

$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'Post_Data' => $post_data);
echo json_encode($arr);
 ?>
