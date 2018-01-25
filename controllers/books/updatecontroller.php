<?php include_once '../../models/db.php';
include_once '../../models/books/books.php';
include_once '../../models/authers/authers.php';

if (isset($_POST['Name']) && isset($_POST['Auther_ID']))
{
	$id = $_POST ['id'];
	$res = $book->update($_POST);
	$data = array();
	$b = $book->fetchdata("id =".$id." ");
	$a = $authers->fetchdata("id =".$b[0]['Auther_ID']." ");
	$result = array_merge($a , $b);
  
if($res){
  echo json_encode($result);

	}

}


?>

