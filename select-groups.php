<?php
include("include/header.php");



 ?>

  <h1>Liste des groupes</h1>

  <ul>
<?php
  if ($result = $connection->query("SELECT * FROM promotions")) {
    while ($row = $result->fetch_assoc()) {
      printf ('<div class="form-group">
        <li><label class="col-md-4 control-label" for="edit-group">%s</label>
        <div class="col-md-8">
          <div id="edit-group%s" name="edit-group%s" class="btn btn-success"><a href="edit-group.php?id=%d">Modifier</a></div>
          <div id="del-group%s" name="del-group%s" class="btn btn-danger"><a href="del-group.php?id=%d">Supprimer</a></div>
        </div></li>
      </div>',
      $row["name"],
      $row["id"],
      $row["id"],
      $row["id"],
      $row["id"],
      $row["id"],
      $row["id"]);
    }
}



  ?>
</ul>
<?php
include("include/footer.php") ?>
