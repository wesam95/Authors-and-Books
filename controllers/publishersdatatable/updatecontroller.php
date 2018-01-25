<?php include_once '../../models/db.php';
include_once '../../models/publishers/publishers.php';

if (isset($_POST['Name']) && isset($_POST['Address']))
{
  $id = $_POST ['ID'];
 
  $res = $publishers->update($_POST);

  $res2 = $publishers->fetchdata('id = '.$id.' ');


	if($res){
      echo json_encode($res2);
      
		
	}
}

?>