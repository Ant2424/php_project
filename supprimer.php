<?php
  include 'config.php';

  $mail_etudiant = $_GET['mail'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Supression de $mail_etudiant </center>");

  $delete = $pdo->exec("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");
  echo 'Nb de lignes effacées : '. $delete;

  unset($pdo);
