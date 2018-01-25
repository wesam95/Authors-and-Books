<?php include_once '../../models/db.php';
include_once '../../models/publishers/publishers.php';

$id = $_GET['d'];
$res = $publishers->fetchdata('id = '.$id.' ');
echo json_encode($res);?>