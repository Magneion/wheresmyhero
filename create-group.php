<?php
  include("include/header.php");

// Si on a reçu des paramètres en POST grâce au formulaire
if(isset($_POST["groupname"]) && $_POST["groupname"] != " ") {
  // On prépare la requête au serveur de base de données
  $request = sprintf("INSERT INTO groups (name) VALUES ('%s')",
              $_POST["groupname"]);
  // On execute la requête
  if($connection->query($request)) {
      // Si on est ici, c’est que ça a marché
      printf("<div class='alert alert-success'>Groupe créé</div>\n<a href='select-groups.php'>Retour à la liste des groupes</a>");
  }
  else {
    // Si on est ici, c’est que ça a foiré. Message pour la gestion d’erreur MySQL
    printf("<div class='alert alert-warning'>Erreur: %s</div>", $connection->error);
  }
}

?>
  <form method="POST" class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <legend>Créer un groupe</legend>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="groupname">Nom du groupe</label>
    <div class="col-md-4">
    <input id="groupname" name="groupname" placeholder="SuperHero Jazzband" class="form-control input-md" required="" type="text">
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="validate"></label>
    <div class="col-md-4">
      <button id="validate" name="validate" class="btn btn-primary">Valider</button>
    </div>
  </div>

  </fieldset>
  </form>
  <?php
  include("include/footer.php");
   ?>
