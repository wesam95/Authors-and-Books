<?php include_once '../../models/db.php';
include_once '../../models/publishers/publishers.php';

$res = $publishers->fetchdata();
$rows = json_encode($res);?>

{
  "data" : <?= $rows ;?>
}

