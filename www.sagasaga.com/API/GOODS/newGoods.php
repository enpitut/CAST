<?php

// this a API for goods 登録
// cteated by great.chou
// 2015/8/28
include ('../DBBaseTable.php');


/*向GOODS表中插入数据  */
$goodsuid = "";
//session

$userid = "7356C2A59B944E7FB3EE5CFD5297843C";
$catalogid = "7356C2A59B944E7FB3EE5CFD5297843C";


$t = new DBBaseTable ( "goods" ); // comments is table name

$array = array (
		"description" => $_POST ["description"],
		"catalogID" => $catalogid,
		"userID" =>$userid
);

$goodsuid = $t->insert_goods ( $array );

/*向PHOTO表中插入数据  */

$t = new DBBaseTable ( "photo" ); // comments is table name

if ($_FILES ["file"] ["size"] < 20000000) {
	if ($_FILES ["file"] ["error"] > 0) {
		echo "Return Code: " . $_FILES ["file"] ["error"] . "<br />";
	} else {
		echo "Upload: " . $_FILES ["file"] ["name"] . "<br />";
		echo "Type: " . $_FILES ["file"] ["type"] . "<br />";
		echo "Size: " . ($_FILES ["file"] ["size"] / 1024) . " Kb<br />";
		echo "Temp file: " . $_FILES ["file"] ["tmp_name"] . "<br />";

		if (file_exists ( "upload/" . $_FILES ["file"] ["name"] )) {
			echo $_FILES ["file"] ["name"] . " already exists. ";
		} else {
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "upload/" . $_FILES ["file"] ["name"] );
			echo "Stored in: " . "upload/" . $_FILES ["file"] ["name"];
		}
	}
} else {
	echo "Invalid file";
}

$array = array (
		"goodsID" => $goodsuid,
		"path" =>  "upload/" . $_FILES ["file"] ["name"]
);

$t->insert_with_array($array);

?>
<!-- over -->