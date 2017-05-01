<?php

  // Définition des informations nécessaire pour la connexion à la base de données

  $myDsn = 'mysql:host=localhost;port=3306;dbname=mini_projet;';
  $myUserDb = "";
  $myDbPwd = "";

  try
  {
    $pdo = new PDO($myDsn,$myUserDb,$myDbPwd);
  }
  catch(PDOException $e)
  {
    echo "pb".$e->getMessage();
  }


  echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
  echo '<link href="css/bootstrap-theme.min.css" rel="stylesheet">';
  echo '<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">';
  echo'<script src="js/bootstrap.min.js"></script>';

  ?>
