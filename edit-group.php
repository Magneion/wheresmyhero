<?php
include("include/header.php");

  // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    // Si on a des variables en POST, on tente de modifier la promotion ciblée
    if (isset($_POST["groupname"]) && $_POST["groupname"] != " ") {
      $request = sprintf("UPDATE promotions SET name='%s' WHERE id='%s'",
                  $_POST["groupname"], $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Groupe modifié</div>");
      }
      else {
        // Gestion d’erreur SQL
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    // On a un id en GET, on sélectionne la promotion et ses informations
    $request = sprintf("SELECT * FROM promotions WHERE id=%s", $_GET["id"]);
    $result = $connection->query($request);
    $promotion = $result->fetch_assoc();
  }
  else {
    // message d’alerte si on n’a pas d’id en paramètre d’URL
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>

    <form class="form-horizontal breathe">
  <fieldset>

  <!-- Form Name -->
  <legend>Modifier un groupe</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="groupname">Nom du groupe</label>
    <div class="col-md-4">
    <input id="groupname" name="groupname" placeholder="Nom" class="form-control input-md" value="<?php printf("%s",$promotion["name"]); ?>" type="text">
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
