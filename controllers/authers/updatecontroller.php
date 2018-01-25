<?php include_once '../../models/db.php';
include_once '../../models/authers/authers.php';

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

