<?php include_once './Classes/DB.php';
include_once './Classes/Authers.php';

$conn = new mysqli('wesam.com', 'root', 'w902t700','Wesam');



if (isset($_POST['Name']) && isset($_POST['E_mail']))
{
	$id = $_POST ['id'];
 
  
  $res = $authers->update($_POST);


  $res2 = $authers->fetchdata('id = '.$id.' ');


	if($res){
      echo json_encode($res2);
      
		
	}
}




?>

