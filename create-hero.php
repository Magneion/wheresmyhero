<?php
  include("include/header.php");

// Si on a reçu des paramètres en POST grâce au formulaire
if(isset($_POST["firstname"]) && $_POST["firstname"] != " " && isset($_POST["lastname"]) && $_POST["lastname"] != " " && isset($_POST["superpower"]) && $_POST["superpower"] != " " && isset($_POST["group_id"]) && $_POST["group_id"] != " ") {
  // On prépare la requête au serveur de base de données
  $request = sprintf("INSERT INTO heroes (firstname, lastname, superpower, group_id) VALUES ('%s', '%s', '%s', '%s')",
              $_POST["firstname"], $_POST["lastname"], $_POST["superpower"], $_POST["group_id"]);
  // On execute la requête
  if($connection->query($request)) {
      // Si on est ici, c’est que ça a marché
      printf("<div class='alert alert-success'>Héros créé</div>\n<a href='groups.php'>Retour à la liste des héros</a>");
  }
  else {
    // Si on est ici, c’est que ça a foiré. Message pour la gestion d’erreur MySQL
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}

?>
<form method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Créer un héros</legend>



<div class="form-group">
  <label class="col-md-4 control-label" for="firstname">Prénom</label>
  <div class="col-md-4">
  <input id="firstname" name="firstname"
  placeholder="Martin" class="form-control input-md"
  required=""
  type="text">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="lastname">Nom</label>
  <div class="col-md-4">
  <input id="lastname" name="lastname"
  placeholder="Dupont" class="form-control input-md"
  required=""
  type="text">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="superpower">Pouvoir</label>
  <div class="col-md-4">
  <input id="superpower" name="superpower"
  placeholder="Contrôle mental des rongeurs" class="form-control input-md"
  required=""
  type="text">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="group_id">Groupe</label>
  <div class="col-md-4">
    <select id="group_id" name="group_id" class="form-control">
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
    <input type="hidden" name="id" value="<?php printf("%s", $group["id"]);?>">
    <button id="validate" name="validate" class="btn btn-primary">Valider</button>
  </div>
</div>
</fieldset>
</form>

  <?php
  include("include/footer.php");
   ?>
