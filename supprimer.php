<?php

  // Inclusion du fichier de configuration pour simplifier et éviter la redondance du code

  include 'config.php';

  // Récupération du mail de l'étudiant via url

  $mail_etudiant = $_GET['mail'];

  // Lien vers la page d'accueil

  echo '<a href="back.php">retour accueil</a>';

  print("<center>Supression de $mail_etudiant </center>");

  // Suppression d'un étudiant dans la base de données et prépare la requête pour lutter contre l'injection de SQL

  $delete = $pdo->prepare("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");

  if($delete->execute(array(':mail'=>$mail_etudiant))){
    echo "Suppression de $mail_etudiant dans la base de données réussie";
  }
  else{
    echo "Problème lors de la suppression de $mail_etudiant dans la base de données";
  }

  unset($pdo);
