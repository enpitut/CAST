<?php

define("SERVER_NAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "sagasaga");

class DBBaseTable{
 var $table_name;

public function __construct($table) {
	$this->table_name = $table;
}

public function query_by_nothing(){
	$sql = "SELECT * FROM " . $this->table_name;
	return $this->query($sql);
}

public function query_by_id($id){
	$sql = "SELECT * FROM " . $this->table_name . " WHERE uid = '" . $id . "'";
	return $this->query($sql);
}

public function query_by_field($field, $value){
	$sql = "SELECT * FROM " . $this->table_name . " WHERE " . $field . " = '" . $value . "'";
	return $this->query($sql);
}

public function query_by_where($where){
  $sql = "SELECT * FROM " . $this->table_name . " WHERE " . $where;
	return $this->query($sql);
}

public function query($sql){
	$result = $this->query_common($sql);
	return $this->result_to_Array($result);
}

private function query_common($sql){
	$conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DBNAME);

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	else{
		// echo 'database connected';
	}

	$result = $conn->query($sql);
	$conn->close();
  // echo $sql;
	return $result;
}

public function update_with_array($id, $arr){
	$sql = "UPDATE " . $this->table_name . " SET ";

	foreach ($arr as $key => $value)
	{
		$sql = $sql . $key . "='" . $value . "',";
	}

	$sql = substr($sql, 0, strlen($sql) - 1);
	$sql = $sql . " WHERE uid = '" . $id ."'";

	return $this->update($sql);
}

public function update($sql){
	return $this->action_common($sql);
}

/*over  */

function insert_with_array($arr) {
  $guid = $this->GUID ();
	$sql = "INSERT INTO " . $this->table_name . " ";
	$f_name = "uid,";
	$f_value = "'" . $guid . "',";

	foreach ( $arr as $key => $value ) {
		$f_name = $f_name . $key . ",";
		$f_value = $f_value . "'" . $value . "',";
	}

	$f_name = substr ( $f_name, 0, strlen ( $f_name ) - 1 );
	$f_value = substr ( $f_value, 0, strlen ( $f_value ) - 1 );

	$sql = $sql . "(" . $f_name . ") VALUES (" . $f_value . ")";

  if($this->insert ($sql)){
    return $guid;
  }

  return "";
}

  public function insert($sql){
    return $this->action_common($sql);
  }

  private function action_common($sql){
  	$conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DBNAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        // echo 'failure';
    }
    else{
//     	echo 'database connected';
    }

    $result = FALSE;
    $conn->query($sql);
    if(mysqli_affected_rows($conn) > 0){
      $result = TRUE;
    }
    $conn->close();

    return $result;
  }

  private function result_to_Array($result){
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }

    return $rows;
  }

  private function GUID()
  {
  	return sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
  }

}
?>
