<?php

include("include/header.php");

 ?>
<h1>Liste des héros</h1>

<ul>
  <?php


  if ($result = $connection->query("SELECT * FROM eleves")) {
    while ($row = $result->fetch_assoc()) {
      printf ('<div class="form-group">
      <li><label class="col-md-4 control-label" for="edit-group">%s %s (%s)</label>
      <div class="col-md-8">
        <div id="edit-group%s" name="edit-group%s" class="btn btn-success"><a href="edit-student.php?id=%d">Modifier</a></div>
        <div id="del-group%s" name="del-group%s" class="btn btn-danger"><a href="del-student.php?id=%s">Supprimer</a></div>
      </div></li>
    </div>',
    $row["firstname"],
    $row["lastname"],
    $row["power"],
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
