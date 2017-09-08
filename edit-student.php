<?php
  include("include/header.php");

  // Si on n’a pas de id dans les paramètres de l’URL, on bloque la page
  if (isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {

    // Si on a des variables en POST, on tente de modifier la promotion ciblée
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["promotion_id"])) {
      $request = sprintf("UPDATE eleves SET
                                      firstname='%s',
                                      lastname='%s',
                                      promotion_id=%s
                                      WHERE id='%s'",
                                      $_POST["firstname"],
                                      $_POST["lastname"],
                                      $_POST["promotion_id"],
                                      $_POST["id"]);
      if($connection->query($request)) {
          printf("<div class='alert alert-success'>Éléve modifié</div>\n<a href='students .php'>Retour à la liste des élèves</a>");
      }
      else {
        // Gestion d’erreur SQL
        printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
      }
    }

    // On a un id en GET, on sélectionne la promotion et ses informations
    $request = sprintf("SELECT * FROM eleves WHERE id=%s", $_GET["id"]);
    $result = $connection->query($request);
    $student = $result->fetch_assoc();
  }
  else {
    // message d’alerte si on n’a pas d’id en paramètre d’URL
    printf("<div class='alert alert-danger'>Pas d’ID renseigné</div>");
    die();
  }
?>
  <form method="post" class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <legend>Modifier un élève</legend>

  <!-- Text input
  Notez les balises PHP qui permettent l’affichage dynamique -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="firstname">Prénom</label>
    <div class="col-md-4">
    <input id="firstname" name="firstname"
    placeholder="Prénom" class="form-control input-md"
    required="" value="<?php printf("%s",$student["firstname"]); ?>"
    type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="lastname">Nom</label>
    <div class="col-md-4">
    <input id="lastname" name="lastname"
    placeholder="Nom" class="form-control input-md"
    required="" value="<?php printf("%s",$student["lastname"]); ?>"
    type="text">
    </div>
  </div>

  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="promotion_id">Groupe</label>
    <div class="col-md-4">
      <select id="promotion_id" name="promotion_id" class="form-control">
        <option value="1">Avengers</option>
        <option value="2">NewAvengers</option>
        <option value="3">Defenders</option>
        <option value="4">Thunderbolts</option>
        <option value="5">X-Men</option>
        <option value="6">YoungAvengers</option>
      </select>
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <input type="hidden" name="id" value="<?php printf("%s", $promotion["id"]);?>">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
  <?php
  include("include/footer.php");
   ?>
