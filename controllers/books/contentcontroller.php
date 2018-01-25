<?php include_once '../../models/db.php';
include_once '../../models/books/books.php';

$id = $_GET['d'];
$res = $book->fetchdata('id = '.$id.' ');
echo json_encode($res);?>
