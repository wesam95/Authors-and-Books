<?php include_once '../../models/db.php';
 include_once '../../models/authers/authers.php';
 
$id = $_GET['d'];
$q = $authers->fetchdata("ID = '$id'");
$q2 = $authers->delete("ID = '$id'");
echo json_encode($q);?>