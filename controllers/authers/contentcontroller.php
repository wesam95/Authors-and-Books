<?php include_once '../../models/db.php';
include_once '../../models/authers/authers.php';

$id = $_GET['d'];
$res = $authers->fetchdata('id = '.$id.' ');
echo json_encode($res);?>