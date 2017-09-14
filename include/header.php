<?php
include("./config/db.php");
$connection = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_base
);

 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/base.css" rel="stylesheet" />
    <title>Where's my hero</title>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
          <li><a href="./index.php"><i class="glyphicon glyphicon-home"></i>Accueil</a></li>
          <li><a href="./select-groups.php"><i class="glyphicon glyphicon-list"></i>Groupes</a></li>
          <li><a href="./select-hero.php"><i class="glyphicon glyphicon-list"></i>Héros</a></li>
          <li><a href="./create-group.php"><i class="glyphicon glyphicon-plus"></i>Ajouter un groupe</a></li>
          <li><a href="./create-hero.php"><i class="glyphicon glyphicon-plus"></i>Ajouter un héros</a></li>
        </ul>
      </nav>
