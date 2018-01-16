<?php include_once './Classes/DB.php';
include_once './Classes/Books.php';

$id = $_GET['d'];
 $res = $book->fetchdata('id = '.$id.' ');
  echo json_encode($res);
?>