<?php

  // Inclusion du fichier de configuration pour simplifier et éviter la redondance du code

  include 'config.php';

  // Récupération du mail de l'étudiant via url

  $mail_etudiant = $_GET['mail'];

  // Lien vers la page d'accueil

  /*echo '<a href="back.php">retour accueil</a>';

  print("<center>Supression de $mail_etudiant </center>");

  // Suppression d'un étudiant dans la base de données et prépare la requête pour lutter contre l'injection de SQL

  $delete = $pdo->prepare("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");

  if($delete->execute(array(':mail'=>$mail_etudiant))){
    echo "Suppression de $mail_etudiant dans la base de données réussie";
  }
  else{
    echo "Problème lors de la suppression de $mail_etudiant dans la base de données";
  }

  unset($pdo);*/

  echo '<div class="alert alert-danger container" role="alert">Etes vous sûr de supprimer cet utilisateur ?<br>';

  echo '<a href="back.php">
        <button type="button" class="btn btn-primary ">
        <span class="fa fa-home fa-lg" aria-hidden="true"></span> Retour
        </button>
        </a>';

  echo '<a href="supprimer.php?mail='.$mail_etudiant.'&click=1">
        <button type="button" class="btn btn-success ">
        <span class="fa fa-check fa-lg" aria-hidden="true"></span> Valider
        </button>
        </a></div>';

  if (isset($_GET["click"]))
  {

          $mail_etudiant = $_GET['mail'];
          $delete = $pdo->prepare("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");

          if($delete->execute(array(':mail'=>$mail_etudiant))){
            header('Location:back.php');
            unset($pdo);
          }
          else{
            echo "Problème lors de la suppression de $mail_etudiant dans la base de données";
          }
          header('Location:back.php');

  }
