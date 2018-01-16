<?php
include_once './Classes/DB.php'; 
include_once './Classes/Books.php';



$result = $book->insert($_POST);


$conn = new mysqli('wesam.com', 'root', 'w902t700','Wesam');
    
$result = $conn->query("SELECT book.ID , book.Name , users.ID As 'uid' ,users.Name AS 'n' FROM book JOIN users ON (book.Auther_ID = users.ID)ORDER BY ID DESC LIMIT 1");

$d = '';
while ($row = $result->fetch_assoc() ) :
							
							
	$d.='<tr class = "active" id = "' . $row['ID'] . '">'
		.'<td class = "id"> ' . $row ['ID'] .' </td>'
		.'<td class ="name"> ' . $row ['Name'] . '</td>'
		.'<td class = "auther" data-id= "' . $row['uid'] . '"> ' . $row['n'] . '</td>'
		.'<td>   <button class ="update">update</button></td>'
		.'<td>   <button class = "delete">delete</button></td></tr>' ;
		
								
			 endwhile; 
			 echo $d;
							

?>