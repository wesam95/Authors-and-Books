<?php include_once './Classes/DB.php';
include_once './Classes/Authers.php';

  $res = $authers->fetchdata();
  $rows = json_encode($res);
?>
{
  "data" : <?= $rows ;?>
}
  
