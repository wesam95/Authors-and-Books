<?php include_once './Classes/DB.php';
include_once './Classes/Authers.php';

$id = $_GET['d'];
 $res = $authers->fetchdata('id = '.$id.' ');
  echo json_encode($res);
?>