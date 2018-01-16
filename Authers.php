<?php include_once './Classes/DB.php';?>
<html>
	<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<meta name = "viewport" content = "width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery/dist/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/validate/dist/jquery.validate.min.js"></script>
  <script src="/js/jquery.form.min.js"></script> 

	<script>
	 $(document).ready(function(){
	 $("#add").click(function(){
			$("#div2").addClass("hidden");
			$("#div1").removeClass("hidden");
			$("#div1").load("form.php", function(){
				window.scrollBy(0 ,500);
				
				            
$("form.ajax").validate();

$("form.ajax").ajaxForm(function(data){
$("#table1").append(data);
$("#div1").empty();
      
    });
			});
		});


		$('body').on('click', '.update', function(){
		$("#div1").addClass("hidden");
		$("#div2").removeClass("hidden");
		window.scrollBy(0 ,500);
		var idvalue = $(this).parent().parent().find(".id").text();
		$.ajax({

			url : "form_fill.php?d="+idvalue+"" ,
			dataType :'json',
			success :function(response){
		    $(".ajax2").find(".formname").val(response[0]['Name']);
		    $(".ajax2").find(".formemail").val(response[0]['E_mail']);
		    $(".ajax2").find(".formid").val(idvalue);


			} 
			 		});

		});

$("form.ajax2").validate();
$("form.ajax2").ajaxForm(function(data){
var d = JSON.parse(data);
     	var row = $("#table1").find("#"+d[0]['ID']+"");
		row.find(".name").text(d[0]['Name']);
      	row.find(".email").text(d[0]['E_mail']);
    
      	$("#div2").addClass("hidden");
     
   
});
	$('body').on('click' , '.delete' ,function(){  
	var idvalue = $(this).parent().parent().find(".id").text();

		$.ajax({url : "Authers_delete.php?d="+idvalue+"" , dataType: 'json' , success: function(data){

			var row = $("#table1").find("#"+data[0]['ID']+"");
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
				background-color: black;
			}

			th{
				color: white;
			}
			.name{
				color: #ff3333;
			}
	
		</style>
	</head>

		<body>
			<?php include 'inner_header.php'; 
				include_once './Classes/Authers.php';

			?>

		<div class ="container">
			<div class ="row">
				<div class = "table-responsive">
					<table id = "table1" class = "table table-bordered table-condensed table-responsive"  >
					<caption> Authers list </caption>
					<tr class = "title">
							<th> ID</th>
							<th> Name</th>
							<th> Email</th>
							<th> actions</th>
							<th></th>
							<th></th>
						</tr>
						<?php
						$result = $authers->fetchdata();
						foreach ($result as  $row) {
						
							?>
							
						<tr class = "active" id = "<?php echo $row['ID']?>">
							<td class = "id"> <?php echo $row["ID"] ?></td>
							<td class ="name"> <?php echo $row["Name"]  ?></td>
							<td class = "email"> <?php echo $row["E_mail"]  ?></td>
							<td> <?php if ($row["Actions"]  == null) echo ' null' ; else echo $row["Actions"]  ?></td>
							<td>   <button class = "update" id = "<?php echo $row['ID']?>">Update </button></td>
							<td>   <button class = "delete">delete</button></td>
							
							
							
					
						</tr>

						<?php } ?>
						
										</table>
					<br/>
					<button type = "button" id = "add">Add</button>
				 
					<br/>

					<div id = "div1"></div>


					<div class = "hidden" id = "div2">

<form class = "ajax2" action = "/update.php" target = "_self" method = "POST" >
  <fieldset>
    <legend>Auther information:</legend>

    <div class = "form-group">
 	<label for = "name">Name:</label>
 	<input class = "form-control formname" type="text" name="Name" minlength="2" autofocus required />
  </div>

  <div class = "form-group">
  <label for = "email">Email:</label>
  <input class = "form-control formemail" type="email" name="E_mail"required />
  </div>

  <div class = "form-group">
  <input class = "formid" type="hidden" name="id"/>
  <input type="submit" value="update"/>
</div>
	</fieldset>

</form>


					</div>


						</div>
					</div>
				</div> 
	</body>
</html>

