<?php include_once '../../models/db.php';
include_once '../../models/authers/authers.php';

$res = $authers->fetchdata();
$rows = json_encode($res);?>

{
  "data" : <?= $rows ;?>
}
  
