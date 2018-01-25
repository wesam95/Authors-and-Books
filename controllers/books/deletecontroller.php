<?php include_once '../../models/db.php';
	  include_once '../../models/books/books.php';

$id = $_GET['d'];
$q = $book->fetchdata("ID = '$id'");
$q2 = $book->delete("ID = '$id'");
echo json_encode($q);


?>