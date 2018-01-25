<?php include_once '../../models/db.php';
	  include '../../views/inner_header.php';
	  include_once '../../models/publishers/publishers.php';?>

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
	 		var table = $('#publishtable').DataTable({	
	 		"ajax": "/controllers/publishersdatatable/remotedata.php", 
	 		"columns": [
	 		{"data":"ID" },
			{"data":"Name", "width" : "20%" },
	 		{"data":"Address", "width" : "35%"},
	 		{"data":"Description" , "width" : "50%" },
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
        	var table = $("#publishtable").DataTable();
        	table.ajax.reload(null ,false);
			$("#div1").addClass("hidden");
        	$('form.ajax').clearForm();
       	});
			$('#publishtable tbody').on('click', '.update', function(){
			$("#div1").addClass("hidden");
			$("#div2").removeClass("hidden");
			window.scrollBy(0 ,500);
			var data = table.row($(this).parents('tr')).data();
			var idvalue = data['ID'];
			$.ajax({
				url : "/controllers/publishersdatatable/contentcontroller.php?d="+idvalue+"" ,
				dataType :'json',
				success :function(response){
				$(".ajax2").find(".formname").val(response[0]['Name']);
		    	$(".ajax2").find(".formaddress").val(response[0]['Address']);
		    	$(".ajax2").find(".formdescription").val(response[0]['Description']);
		   		$(".ajax2").find(".formid").val(response[0]['ID']);

			} 
		});

	});
				$("form.ajax2").validate();
				$("form.ajax2").ajaxForm(function(){
				var table = $("#publishtable").DataTable();
 				table.ajax.reload(null , false);
 				$("#div2").addClass("hidden");
		});
				$('#publishtable tbody').on('click' , '.delete' ,function(){  
				var data = table.row($(this).parents('tr')).data();
				var idvalue = data['ID'];
				$.ajax({
					url : "/controllers/publishersdatatable/deletecontroller.php?d="+idvalue+"" , dataType: 'json' , success: function(data){
					var row = $("#publishtable").find("#"+data[0]['ID']+"");
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
					<table id = "publishtable" class = "table-striped table-hover">
						<thead>
							<tr class = "title">
								<th> ID</th>
								<th> Name</th>
								<th> Address</th>
								<th> Description</th>
								<th></th>
								<th></th>
						  	</tr>
					</thead>
				</table>
			<br/>

	<button type = "button" id = "add">Add</button>
				 
<br/>

<div id = "div1" class = "hidden">
	<form action = "/controllers/publishersdatatable/submitcontroller.php" target = "_self" method = "POST" class = "ajax" >
  		<fieldset>
    		<legend>Publisher information:</legend>

 				<div class="form-group">
 					<label for = "name">Name:</label> 
  					<input class="form-control" type="text" placeholder="Enter Company name" name="Name" minlength ="3" autofocus required />
  			 	</div>

 				<div class="form-group">
  					<label for="address">Address:</label>
  					<input class="form-control"type="text" placeholder="Enter Company Address" name="Address" required/>
  				</div>

 				<div class="form-group">
  					<label for="description">Description (optional):</label>
  					<textarea class="form-control" rows = "5" placeholder="write a description" name="Description"></textarea>
  				</div>


   				<input type="submit" value="Submit">
		</fieldset>
	</form>
</div>

<div class = "hidden" id = "div2">

	<form class = "ajax2" action = "/controllers/publishersdatatable/updatecontroller.php" target = "_self" method = "POST" >
  		<fieldset>
    		<legend>Auther information:</legend>

    		<div class = "form-group">
 				<label for = "name">Name:</label>
 				<input class = "form-control formname" type="text" name="Name" minlength ="3" autofocus required />
  			</div>

  			<div class = "form-group">
  				<label for = "address">Address:</label>
  				<input class = "form-control formaddress" type="text" name="Address"required />
  			</div>

 			<div class="form-group">
  				<label for="description">Description (optional):</label>
  				<textarea class="form-control formdescription" rows = "5" name="Description"></textarea>
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
		</div>
	</body>
</html>