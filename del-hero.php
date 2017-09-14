<?php
  include("include/header.php");

  if(isset($_POST["user_validation"]) && $_POST["user_validation"] == "1"
    && is_numeric($_POST["id"])) {
    $request = sprintf("DELETE FROM heroes WHERE id='%s'",$_POST["id"]);
    $result = $connection->query($request);
    if($result) {
      die("<div class='alert alert-success'>Suppression réussie</div>");
    }
    else {
      die("<div class='alert alert-danger'>Suprression échouée</div>");
    }
  }

  if(isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0)  {
    $request = sprintf("SELECT * FROM heroes WHERE id=%d",$_GET["id"]);
    $result = $connection->query($request);
    $hero = $result->fetch_assoc();
  }
  else {
    die("<div class='alert alert-warning'>Vous devez renseigner un id</div>");
  }
?>

<form method="post" class="form-horizontal">
<fieldset>

<legend>Suppression d’un étudiant</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="heroname">Nom du héros</label>
  <div class="col-md-4">
  <input id="heroname" name="heroname"
   value="<?=$hero["firstname"]?> <?=$hero["lastname"]?>"
   class="form-control input-md"
   disabled="true"
   type="text">

  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Attention, êtes-vous sûr de vouloir supprimer <?=$hero["firstname"]?> <?=$hero["lastname"]?> ?</label>
  <div class="col-md-2">
    <label class="checkbox-inline" for="checkboxes-0">
      <input name="user_validation" id="user_validation" value="1" type="checkbox">
      Oui, j'en suis sûr.e.
    </label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="deletehero"></label>
  <div class="col-md-4">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <button class="btn btn-danger">Supprimer</button>
  </div>
</div>

</fieldset>
</form>


<?php
  include("include/footer.php");
?>
