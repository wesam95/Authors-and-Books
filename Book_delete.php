				
<?php include_once './Classes/DB.php';
	 include_once './Classes/Books.php';

$id = $_GET['d'];
							
$q = $book->fetchdata("ID = '$id'");
$q2 = $book->delete("ID = '$id'");

echo json_encode($q);


?>