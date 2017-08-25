<?php
include("./config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$jsonvar = json_decode($_POST);
$request = sprintf("DELETE FROM eleves
WHERE id='%s'",
$jsonvar['id']
);

if($connection->query($request)) {
  echo json_encode('success');
}
else {
  echo json_encode('failure');
}


 ?>
