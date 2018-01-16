
<div class="container">
<form action = "/form_submit.php" target = "_self" method = "POST" class = "ajax" >
  <fieldset>
    <legend>Auther information:</legend>

 <div class="form-group">
 <label for = "name">Name:</label> 
  <input class="form-control" type="text" placeholder="Enter name" name="Name" minlength= "2"autofocus required/>
  </div>

 <div class="form-group">
  <label for="email">Email:</label>
  <input class="form-control"type="email" placeholder="Enter email" name="E_mail" required/>
  </div>
   <input type="submit" value="Submit">
	</fieldset>

</form>
</div>
