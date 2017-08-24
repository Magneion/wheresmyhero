<?php



if ($connection->connect_error) {
  printf(
    "Erreur de connexion.<br>Message d’erreur: %s<br>Code d’erreur: %s",
    $connection->connect_error,$connection->connect_errno
  );
}
else {
  printf("On est connectés, hourra");
}


 ?>
