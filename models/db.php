<?php
class DBcon {

public $conn;
public $host = "wesam.com";
public $username = "root";
public $pass = "w902t700";
public $database = "Wesam";

public function __construct(){

	 $this->conn = new mysqli($this->host , $this->username , $this->pass , $this->database);
}

public function fetchdata($condition = null , $constraints = null){
	
	if($condition == null){
	$f = "SELECT * FROM " . $this->table . " " .$condition. " " .$constraints. " ";}
	else {$f = "SELECT * FROM " . $this->table . " WHERE " .$condition. " " .$constraints. " ";}
	$res = $this->conn->query($f);
	$data = array();
	while($row = $res->fetch_assoc()){
		$data [] = $row;
	}

	return $data;

}

public function fetchone($column , $condition = null ){

	if($condition == null)
	{$f = "SELECT " .$column. " FROM " .$this->table. " " .$condition. " ";}
else{$f = "SELECT " .$column. " FROM " .$this->table. " WHERE " .$condition. " ";}
	$res = $this->conn->query($f);
	$data = array();	
	while($row = $res->fetch_assoc()){
		$data[] = $row;

	}
	return $data;

}

 public function insert($arr){

 	$keys = '';
 	$v = '';
 	foreach ($arr as $key => $value) {
 		
 		$keys .=  $key .",";
 		$v 	  .=  "'".$value."'" .",";
 }

 $trimedKey = rtrim($keys , ",");
 $trimedV = rtrim($v , ",");

 	$f = "INSERT INTO ". $this->table ." (". $trimedKey .") VALUES ( $trimedV ) ";
 	$res = $this->conn->query($f);
 	return $res;


 }

 public function update($arr)
 {
 	$id = $arr["id"];
 	unset($arr["id"]);
 	$keys = '';
 	foreach ($arr as $key => $value) {
 		
 		$keys .=  $key ." = '". $value ."',";

 	}

 	$trimedKey = rtrim($keys , ",");
 	$f = "UPDATE " .$this->table. " SET ". $trimedKey ." WHERE id = ". $id . " ";
 	$res = $this->conn->query($f);
 	return $res;
 }
 public function delete($condition)
 {
 	$f= "DELETE FROM " .$this->table. " WHERE " .$condition. " ";
 	$res = $this->conn->query($f);
 	return $res;
 }

}


 $db = new DBcon();

