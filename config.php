<?php
  // ***************************************************************************
  // * Mini projet PHP proposé par Christophe Vignaud
  // *
  // * Antoine Auffret et Virgile Prin
  // * ISEN-Brest CIR2 2016-2017
  // *
  // * Date : 1er mai 2017
  // * Version : 1.0
  // *
  // * Fichier: config.php
  // *
  // * Définition des informations nécessaire pour la connexion à la base de données
  // ***************************************************************************

  // Méthode non sécurisée pour faciliter les modifications
  $myDsn = 'mysql:host=localhost;port=3306;dbname=mini_projet;';
  $myUserDb = $_POST['id'];
  $myDbPwd = $_POST['mdp'];

  try
  {
    $pdo = new PDO($myDsn,$myUserDb,$myDbPwd);
  }
  catch(PDOException $e)
  {
    echo "pb".$e->getMessage();
  }

  if(isset($pdo) == false)
  {
    echo '<form method="post">';
      echo '<input type="text" name="id">';
      echo '<input type="text" name="mdp">';
      echo '<button type="submit">connexion</button>';
    echo '</form>';
  }



  echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
  echo '<link href="css/bootstrap-theme.min.css" rel="stylesheet">';
  echo '<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">';
  echo '<script src="js/bootstrap.min.js"></script>';
?>
