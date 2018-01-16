<?php
include_once './Classes/DB.php';
include_once './Classes/Books.php';
$conn = new mysqli('wesam.com', 'root', 'w902t700','Wesam');


if (isset($_POST['Name']) && isset($_POST['Auther_ID']))
{
	$id = $_POST ['id'];

	$res = $book->update($_POST);
	
	  $res2 = $conn->query("SELECT book.ID , book.Name , users.ID AS 'uid' , users.Name AS 'n' FROM book JOIN users ON (book.Auther_ID = users.ID) WHERE book.id = '$id'");
		
	  $row = $res2->fetch_assoc();
	  


if($res){
  echo json_encode($row);

	}

}


?>

