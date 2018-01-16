<?php include_once './Classes/DB.php';
include_once './Classes/Authers.php';
include_once './Classes/Books.php';
include 'header.php' ; 
?>

<html>
	<head>
<meta charset = "utf-8">
<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
<meta name = "viewport" content = "width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script>$(document).ready(function(){
	$("button").click(function(){
		$("ol").append("<li>new book </li>");
	});
});
</script>
	
		<style>
			h1 {
    text-shadow: 3px 2px red;
    font : oblique bold 50px Times, serif;
}

h2 {
	font: italic normal 35px Georgia, Serif;
}

h4{
	font-size: 25px;
	color: #739900;
	line-height: 35px;
}

label{
	font-size: 18px;
}

small{
	font-style: italic;
	color: #1a75ff;

}
.list-group{
	border-bottom: 3px solid black;
}

.row{
    overflow: hidden; 
}

[class*="col-"]{
    margin-bottom: -99999px;
    padding-bottom: 99999px;
}

		</style>
	</head>
 
		<body>

		
		
		
		<div class = "container">

		<h1 class = "text-center">Welcome</h1>
		<h2 class = "text-left">Recent Books :</h2>
		<br/><br/>

		<?php
		$result = $book->fetchdata("" , "ORDER BY ID DESC LIMIT 3");
		foreach ($result as $row) {
			$result2 = $authers->fetchone("Name" , "id = ".$row['Auther_ID']." ");

?>
		  <div class="list-group">
		  <h4 class="list-group-item-heading"><?php echo $row['Name']; ?></h4>
		  <small class = "text-left">Auther :</small><label class="list-group-item-text"><?php echo $result2[0]["Name"]; ?></label>
		  <br/><br/>
		</div>
<?php } ?>
<br/><br/>
	

		</div>

		</body>
</html>
