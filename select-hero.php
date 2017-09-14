<?php

include("include/header.php");

 ?>
<h1>Liste des héros</h1>

<ul>
  <?php


  if ($result = $connection->query("SELECT * FROM heroes")) {
    while ($row = $result->fetch_assoc()) {
      printf ('<div class="form-group">
      <li><label class="col-md-4 control-label" for="edit-hero">%s %s (%s)</label>
      <div class="col-md-8">
        <div id="edit-hero%s" name="edit-hero%s" class="btn btn-success"><a href="edit-hero.php?id=%d">Modifier</a></div>
        <div id="del-hero%s" name="del-hero%s" class="btn btn-danger"><a href="del-hero.php?id=%s">Supprimer</a></div>
      </div></li>
    </div>',
    $row["firstname"],
    $row["lastname"],
    $row["superpower"],
    $row["id"],
    $row["id"],
    $row["id"],
    $row["id"],
    $row["id"],
    $row["id"]);
    }
  }
  else {
    printf("Tu t'es planté");
  }


  ?>
</ul>
<?php
include("include/footer.php") ?>
