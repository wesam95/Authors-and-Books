<?php include_once './Classes/DB.php'; 	
 include 'inner_header.php'; 
include_once './Classes/Books.php';
include_once './Classes/Authers.php';
?>

<html>
	<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<meta name = "viewport" content = "width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery/dist/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
    <script src="/js/validate/dist/jquery.validate.min.js"></script>
  <script src="js/jquery.form.min.js"></script> 


	<script>
	 $(document).ready(function(){
		$("#add").click(function(){
			$("#div2").addClass("hidden");
			$("#div1").removeClass("hidden");
			$("#div1").load("book_form.php" , function(){
			window.scrollBy(0 ,500);
			$("form.ajax2").validate();

  $("form.ajax2").ajaxForm(function(data){ 

        $("#table2").append(data);
        $("#div1").empty();
      
});
  
			});
		});


  
	
		$("body").on('click', '.update' , function(){
		$("#div1").addClass("hidden");
		$("#div2").removeClass("hidden");
		window.scrollBy(0,500);
		var idvalue = $(this).parent().parent().find(".id").text();
		$.ajax({
			url: "book_form_fill.php?d="+idvalue+"" ,
			dataType: 'json',
			success : function(response){
				$(".ajax").find(".formname").val(response[0]['Name']);
				$(".ajax").find(".updateBook").val(response[0]['Auther_ID']);
				$(".ajax").find(".formid").val(idvalue);

			} 
		});

	});
$("form.ajax").validate();
$("form.ajax").ajaxForm(function(data){
	var d = JSON.parse(data);

      	   var row = $("#table2").find("#"+d['ID']+"");
      	   $(row).find(".name").text(d['Name']);
      	   $(row).find(".auther").text(d['n']);
      	   $("#div2").addClass("hidden");
      	   $(row).find(".auther").attr('data-id' , d['uid']);	
      	 

});


		$("body").on('click' , '.delete' , function(){
		var idvalue = $(this).parent().parent().find(".id").text();
		$.ajax({url : "Book_delete.php?d="+idvalue+"" , dataType: 'json' , success: function(data){

			var row = $("#table2").find("#"+data[0]['ID']+"");
			$(row).remove();
		}
	});
	});
	});
	</script>
		<style>
			table, th, td {
			border: 1px solid black;
			border-collapse : collapse;
			}
			th, td {
			padding: 15px;
			}
		
			.title {
				background-color:  #006600;
			}
			th{
				color: white;
			}
			.name{
				color: #739900;
			}
				</style>


	</head>

		<body>


	<div class ="container">
			<div class ="row">
				<div class = "table-responsive">
				<table id = "table2" class = "table table-bordered table-condensed table-responsive">
					<caption>Books list</caption>
						<tr class = "title">
							<th> ID</th>
							<th> Name</th>
							<th>Auther_ID</th>
					 		<th></th>
							<th></th>
							
						</tr>
						
						<?php 
						
						$bookresult = $book->fetchdata(); 
						foreach ($bookresult as $bookrow) {
						$auther = $authers->fetchone("ID","ID = ". $bookrow['Auther_ID'] ."");
							?>
							
 						<tr class = "active" id = "<?php echo $bookrow['ID']?>">
							<td class = "id"> <?php echo $bookrow ['ID'] ; ?></td>
							<td class ="name"> <?php echo $bookrow ['Name'] ; ?></td>
							<td class = "auther" data-id= "<?= $auther[0]['ID']  ?>">

						<?php	
						$result = $authers->fetchone("Name","ID = ". $bookrow ['Auther_ID'] ." ");
						echo $result[0]["Name"];

						?> </td>
							<td>   <button class ="update">update</button></td>
							<td>   <button class = "delete">delete</button></td>
							
						</tr>
					<?php } ?>
												
						</table>
						<br/>
						<button type = "button" id = "add">Add</button> <br/>

					<div id = "div1"></div>

					<div class = "hidden" id = "div2">

 <form class = "ajax" action = "/book_update.php" target = "_self" method = "POST" >
  <fieldset>
    <legend>Book information:</legend>
<div class = "form-group">
	<label for = "name">Name:</label>
	<input class = "form-control formname" type="text" name="Name" minlength="2" autofocus required />
  </div>

  <div class = "form-group">
  <label for = "auther">Auther:</label>
<?php 	$conn = new mysqli('wesam.com', 'root', 'w902t700','Wesam');

							$auther = $conn->query('select id ,name from users '); ?>
  <select class = "form-control updateBook" name = "Auther_ID" >
				<?php 
							 while ($autherrow = $auther->fetch_assoc()):?>
						    <option id = "<?php echo $bookrow['ID']?>" class = "formauther" value = <?= $autherrow['id'] ?>> <?= $autherrow ['name'] ; ?></option>
							<?php endwhile ?>
							</select>
						</div>
		<div class = "form-group">				
  <input class = "formid" type="hidden" name="id">
    <input type="submit" value="update">
</div>
	</fieldset>

</form>
</div>

						</div>
					</div>
				</div>

		</body>
</html>
