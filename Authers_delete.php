<?php include_once './Classes/DB.php';
 include_once './Classes/Authers.php';
 
$id = $_GET['d'];
$q = $authers->fetchdata("ID = '$id'");
$q2 = $authers->delete("ID = '$id'");
echo json_encode($q);
	?>