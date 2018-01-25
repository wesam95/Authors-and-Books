<?php
include_once '../../models/db.php'; 
include_once '../../models/publishers/publishers.php';

$result = $publishers->insert($_POST);
$result2 = $publishers->fetchdata("" , "ORDER BY ID DESC LIMIT 1");

$d = '';
foreach ($result2 as $row) {

$d .= '<tr class = "active" id = "'.  $row['ID']. '">'
.'<td class = "id">'.   $row ['ID'] .'</td>'
.'<td class ="name">'.  $row ['Name'] .'</td>'
.'<td class = "address">'.  $row ['Address'] .'</td>'
.'<td class = "description">'.$row ['Description'].'</td>'
.'<td>   <button class = "update">Update </button></td>'
.'<td>   <button class = "delete">delete</button></td></tr>';
 }
 
echo $d;
 ?>