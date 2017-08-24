<?php
include("include/header.php");

  // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    // Si on a des variables en POST, on tente de modifier la promotion ciblée
    if (isset($_POST["firstname"]) && $_POST["firstname"] != " ") {
      $request = sprintf("UPDATE eleves SET name='%s' WHERE id='%s'",
                  $_POST["firstname"], $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Prénom du héros modifié</div>");
      }
      else {
        // Gestion d’erreur SQL
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    // On a un id en GET, on sélectionne la promotion et ses informations
    $request = sprintf("SELECT * FROM eleves WHERE id=%d", $_GET["id"]);
    $result = $connection->query($request);
    $student =$result->fetch_assoc();
  }
  else {
    // message d’alerte si on n’a pas d’id en paramètre d’URL
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>

    <form class="form-horizontal breathe" method="post">
  <fieldset>

  <!-- Form Name -->
  <legend>Modifier un héros</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="firstname">Prénom</label>
    <div class="col-md-4">
    <input id="firstname" name="firstname" placeholder="<?=$student["firstname"]?>" class="form-control input-md" type="text">

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="lastname">Nom</label>
    <div class="col-md-4">
    <input id="lastname" name="lastname" placeholder="<?=$student["lastname"]?>" class="form-control input-md" type="text">

    </div>
  </div>

  <!-- Int input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="age">Age</label>
    <div class="col-md-4">
    <input id="age" name="age" placeholder="<?=$student["age"]?>" class="form-control input-md" type="number">

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="supersuperpower">Pouvoir</label>
    <div class="col-md-4">
    <input id="superpower" name="superpower" placeholder="<?=$student["superpower"]?>" class="form-control input-md" type="text">

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="herogroup">Groupe</label>
    <div class="col-md-4">
    <input id="herogroup" name="herogroup" placeholder="<?=$student["promotion_id"]?>" class="form-control input-md" type="text">

    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
      <button id="submit" name="submit" class="btn btn-default">Envoyer</button>
    </div>
  </div>

  </fieldset>
  </form>

  <?php
  include("include/footer.php") ?>
