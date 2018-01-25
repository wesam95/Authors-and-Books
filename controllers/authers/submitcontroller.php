<?php
include_once '../../models/db.php'; 
include_once '../../models/authers/authers.php';


$result = $authers->insert($_POST);

$result2 = $authers->fetchdata("" , "ORDER BY ID DESC LIMIT 1");

$d = '';
foreach ($result2 as $row) {
	

$actions = '';
if ($row ['Actions'] == null)
  $actions = 'null';  
else 
	$actions = $row ['Actions'];
$d .= '<tr class = "active" id = "'.  $row['ID']. '">'
.'<td class = "id">'.   $row ['ID'] .'</td>'
.'<td class ="name">'.  $row ['Name'] .'</td>'
.'<td class = "email">'.  $row ['E_mail'] .'</td>'
.'<td>'.$actions.'</td>'
.'<td>   <button class = "update">Update </button></td>'
.'<td>   <button class = "delete">delete</button></td></tr>';
 }
 
echo $d;
 ?>

							
