<?php

  // Définition des informations nécessaire pour la connexion à la base de données

  $myDsn = 'mysql:host=localhost;port=3306;dbname=mini_projet;';
  $myUserDb = "root";
  $myDbPwd = "root";

  try
  {
    $pdo = new PDO($myDsn,$myUserDb,$myDbPwd);
  }
  catch(PDOException $e)
  {
    echo "pb".$e->getMessage();
  }
