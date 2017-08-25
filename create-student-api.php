<?php
include("./config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$jsonvar = json_decode($_POST);
$request = sprintf("INSERT INTO `eleves`(`id`, `firstname`, `lastname`, `promotion_id`, `age`, `superpower`) VALUES (
  NULL,
  firstname='%s',
  lastname='%s',
  promotion_id=%d,
  age=%d,
  superpower='%s')",
$jsonvar['firstname'],
$jsonvar['lastname'],
$jsonvar['promotion_id']
$jsonvar['age'],
$jsonvar['superpower'],

);

if($connection->query($request)) {
  echo json_encode('success');
}
else {
  echo json_encode('failure');
}


 ?>
