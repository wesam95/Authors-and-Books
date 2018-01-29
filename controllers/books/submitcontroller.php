<?php include_once '../../models/db.php'; 
include_once '../../models/bookauther/bookauther.php';

$result = $book->insert($_POST);
$b = $bookauther->fetchdata("" , "ORDER By ID DESC LIMIT 1");

$d = '';
foreach ($b as $row) :
	
	$d.='<tr class = "active" id = "' . $row['ID'] . '">'
		.'<td class = "id"> ' . $row ['ID'] .' </td>'
		.'<td class ="name"> ' . $row ['Name'] . '</td>'
		.'<td class = "auther" data-id= "' . $row['UID'] . '"> ' . $row['UName'] . '</td>'
		.'<td>   <button class ="update">update</button></td>'
		.'<td>   <button class = "delete">delete</button></td></tr>' ;						
endforeach; 
echo $d;
							

?>