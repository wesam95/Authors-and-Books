<?php include_once '../../models/db.php';
      include_once '../../models/books/books.php';
      include_once '../../models/authers/authers.php';?>


<form  action = "/controllers/books/submitcontroller.php" target = "_self" method = "POST" class = "ajax2" >
  <fieldset>
    <legend>Book information:</legend>

<div class="form-group">
    <label for= "name">Name:</label>
    <input class = "form-control" type="text" placeholder = "Book name" name="Name" minlength= "2"  autofocus required/>
</div>

<div class="form-group">
      <label for = "auther">Auther:</label>
<?php $auther = $authers->fetchdata();?>
      <select class = "form-control updatebook" name = "Auther_ID"required>
      <option value = "" disabled hidden selected>-Select Auther-</option>
<?php foreach ($auther as $autherrow) :?>
			<option value=<?= $autherrow['ID']?>><?= $autherrow ['Name'] ; ?></option>
<?php endforeach ?>
      </select>
</div>
    <input type="submit" value="Submit"/>
	 </fieldset>

  </form>
</div>
