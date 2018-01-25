<?php include_once '../../models/db.php';
 include_once '../../models/publishers/publishers.php';
 
$id = $_GET['d'];
$q = $publishers->fetchdata("ID = '$id'");
$q2 = $publishers->delete("ID = '$id'");
echo json_encode($q);?>