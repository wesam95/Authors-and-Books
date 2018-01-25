<?php include_once '../../models/db.php';
	  include '../../views/inner_header.php'; 
	  include_once '../../models/authers/authers.php';?>

<html>
	<head>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/js/datatables/css/jquery.dataTables.min.css">
  		<script src="/assets/js/jquery/dist/jquery.min.js"></script>
  		<script src="/assets/js/bootstrap.min.js"></script>
 		<script src="/assets/js/datatables/js/jquery.dataTables.min.js"></script>
  		<script src="/assets/js/validate/dist/jquery.validate.min.js"></script>
  		<script src="/assets/js/jquery.form.min.js"></script> 

  		<script>
	 		$(document).ready(function(){
	 		var table = $('#table1').DataTable({	
	 		"ajax": "/controllers/authersdatatable/remotedata.php", 
	 		"columns": [
	 		{"data":"ID" , "width" : "15%"},
			{"data":"Name" ,"width" : "20%"},
	 		{"data":"E_mail", "width" : "25%"},
	 		{"data":"Actions" , "visible" : false},
	 		{"data":"ID" ,"width" : "20%","render": function ( data, type, row, meta ) {
      		return '<button class = "update">update</button>';}},
			{"data":"ID" ,"width" : "20%","render": function ( data, type, row, meta ) {
      		return '<button class = "delete">delete</button>';}}
	 		]
	 	});

			$("#add").click(function(){
			$("#div2").addClass("hidden");
			$("#div1").removeClass("hidden");
			window.scrollBy(0 ,500);
		});

		    $("form.ajax").validate();
			$("form.ajax").ajaxForm(function(){
        	var table = $("#table1").DataTable();
        	table.ajax.reload(null ,false);
			$("#div1").addClass("hidden");
        	$('form.ajax').clearForm();
       	});

      
		$('#table1 tbody').on('click', '.update', function(){
		$("#div1").addClass("hidden");
		$("#div2").removeClass("hidden");
		window.scrollBy(0 ,500);
		var data = table.row($(this).parents('tr')).data();
		var idvalue = data['ID'];
		$.ajax({
			url : "/controllers/authers/contentcontroller.php?d="+idvalue+"" ,
			dataType :'json',
			success :function(response){
			$(".ajax2").find(".formname").val(response[0]['Name']);
		    $(".ajax2").find(".formemail").val(response[0]['E_mail']);
		    $(".ajax2").find(".formid").val(response[0]['ID']);

			} 
		});

	});

			$("form.ajax2").validate();
			$("form.ajax2").ajaxForm(function(){
			var table = $("#table1").DataTable();
 			table.ajax.reload(null , false);
 			$("#div2").addClass("hidden");
});

			$('body').on('click' , '.delete' ,function(){  
			var data = table.row($(this).parents('tr')).data();
			var idvalue = data['ID'];
			$.ajax({url : "/controllers/authers/deletecontroller.php?d="+idvalue+"" , dataType: 'json' , success: function(data){
			var row = $("#table1").find("#"+data[0]['ID']+"");
			table.ajax.reload(null , false);
			}
		});
	});
});

	</script>
</head>
	<body>
		<div class ="container">
			<div class ="row">
				<div class = "table-responsive">
					<table id = "table1" class = "table-striped table-hover">
						<thead>
							<tr class = "title">
								<th> ID</th>
								<th> Name</th>
								<th> Email</th>
								<th> actions</th>
								<th></th>
								<th></th>
						  	</tr>
					</thead>
				</table>
			<br/>

	<button type = "button" id = "add">Add</button>
				 
<br/>

<div id = "div1" class = "hidden">
	<form action = "/controllers/authers/submitcontroller.php" target = "_self" method = "POST" class = "ajax" >
  		<fieldset>
    		<legend>Auther information:</legend>

 				<div class="form-group">
 					<label for = "name">Name:</label> 
  					<input class="form-control" type="text" placeholder="Enter name" name="Name" minlength ="2" autofocus required />
  			 	</div>

 				<div class="form-group">
  					<label for="email">Email:</label>
  					<input class="form-control"type="email" placeholder="Enter email" name="E_mail" required />
  				</div>

   				<input type="submit" value="Submit">
		</fieldset>
	</form>
</div>


<div class = "hidden" id = "div2">

	<form class = "ajax2" action = "/controllers/authers/updatecontroller.php" target = "_self" method = "POST" >
  		<fieldset>
    		<legend>Auther information:</legend>

    		<div class = "form-group">
 				<label for = "name">Name:</label>
 				<input class = "form-control formname" type="text" name="Name" minlength ="2" autofocus required />
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