<?php include_once '../../models/db.php';
include_once '../../models/bookauther/bookauther.php';

if (isset($_POST['Name']) && isset($_POST['Auther_ID']))
{
	$id = $_POST ['id'];
	$res = $book->update($_POST);
	
	$b = $bookauther->fetchdata("id =".$id." ");

if($res){
  echo json_encode($b);

	}

}


?>

