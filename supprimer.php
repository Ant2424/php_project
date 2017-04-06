<?php
  include 'config.php';

  $Prenom = $_GET['etudiant'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Supression de $Prenom </center>");

  $delete = $pdo->exec("DELETE FROM etudiant WHERE prenom = '$Prenom'");
  echo 'Nb de lignes effacees : '. $delete;

  unset($pdo);
