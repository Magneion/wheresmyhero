<?php
include("include/header.php");
if (isset($_POST["user_validation"]) && $_POST["user_validation"] == "1" && is_numeric($_POST["id"])) {
  $request = sprintf("DELETE * FROM promotions WHERE id='%d'", $_GET["id"]);
  $result = $connection->query($request);
  if ($result) {
    die('<div class="alert alert-success">Suppression réussie</div>');
  }
  else {
    die('<div class="alert alert-danger">Suppression échouée</div>');
  }
}
$request = sprintf("SELECT * FROM promotions WHERE id=%d", $_GET["id"]);
$result = $connection->query($request);
$group =$result->fetch_assoc();
 ?>
 <form class="form-horizontal">
 <fieldset>

 <!-- Form Name -->
 <legend>Supprimer un groupe</legend>


 <!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes"> Voulez-vous vraiment supprimer <?=$group['name']?> ?</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkboxes-0">
      <input name="user_validation" id="user_validation" value="1" type="checkbox">
      Oui
    </label>
	</div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-default">Valider</button>
  </div>
</div>


 </fieldset>
 </form>

<?php
include("include/footer.php");
