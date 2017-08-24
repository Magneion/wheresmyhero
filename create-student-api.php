<?php
include("./config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

$_POST = json_decode($_POST);
$request = sprintf("INSERT INTO `eleves`(`id`, `firstname`, `lastname`, `promotion_id`, `age`, `superpower`) VALUES (
  NULL,
  firstname='%s',
  lastname='%s',
  promotion_id=%d,
  age=%d,
  superpower='%s')",
$_POST['firstname'],
$_POST['lastname'],
$_POST['promotion_id']
$_POST['age'],
$_POST['superpower'],

);

if($connection->query($request)) {
  echo json_encode('success');
}
else {
  echo json_encode('failure');
}


 ?>
