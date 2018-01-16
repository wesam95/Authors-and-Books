<?php include_once './Classes/DB.php';
    include_once './Classes/Books.php';
    include_once './Classes/Authers.php';
?>


<div class="container">
<form  action = "/book_form_submit.php" target = "_self" method = "POST" class = "ajax2" >
  <fieldset>
    <legend>Book information:</legend>

    <div class="form-group">
    <label for= "name">Name:</label>
  <input class = "form-control" type="text" placeholder = "Book name" name="Name" minlength= "2"  autofocus required/>
  </div>

  <div class="form-group">
  <label for = "auther">Auther:</label>
  
				<?php 
                $auther = $authers->fetchdata();
        ?>
  <select class = "form-control updatebook" 
  name = "Auther_ID" 

  required>

    <option value = "" disabled hidden selected>-Select Auther-</option>
				<?php 
             foreach ($auther as $autherrow) {
                ?>
							 
							<option value=<?= $autherrow['ID']?>><?= $autherrow ['Name'] ; ?></option>
							<?php } ?>

              
							</select>
</div>
    <input type="submit" value="Submit"/>
	</fieldset>

</form>
</div>
