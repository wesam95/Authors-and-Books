<?php include_once '../../models/db.php'; 
include_once '../../models/books/books.php';
include_once '../../models/authers/authers.php';

$result = $book->insert($_POST);
$b = $book->fetchdata("" , "ORDER By ID DESC LIMIT 1");
$a = $authers->fetchdata("id = ".$b[0]['Auther_ID']." "); 

$d = '';
foreach ($b as $row) :
	var_dump($row);
	$d.='<tr class = "active" id = "' . $row['ID'] . '">'
		.'<td class = "id"> ' . $row ['ID'] .' </td>'
		.'<td class ="name"> ' . $row ['Name'] . '</td>'
		.'<td class = "auther" data-id= "' . $a[0]['ID'] . '"> ' . $a[0]['Name'] . '</td>'
		.'<td>   <button class ="update">update</button></td>'
		.'<td>   <button class = "delete">delete</button></td></tr>' ;						
endforeach; 
echo $d;
							

?>