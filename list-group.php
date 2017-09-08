<?php

include("include/header.php");

 ?>
<h1>Liste des héros</h1>

<ul>
  <?php

if(isset($_GET["id"]) && $_GET["id"] != "" && $_GET["id"] != 0) {
  if ($result = $connection->query("SELECT * FROM eleves WHERE promotion_id ='%s', $_GET['id']") {
    while ($row = $result->fetch_assoc()) {
      printf ('<div class="form-group">
      <li><label class="col-md-4 control-label" for="edit-student">%s %s (%s)</label>
      <div class="col-md-8">
        <div id="edit-student%s" name="edit-student%s" class="btn btn-success"><a href="edit-student.php?id=%d">Modifier</a></div>
        <div id="del-student%s" name="del-student%s" class="btn btn-danger"><a href="del-student.php?id=%s">Supprimer</a></div>
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
}
  else {
    printf("Tu t'es planté");
  }


  ?>
</ul>
<?php
include("include/footer.php") ?>
