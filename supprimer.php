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
  // * Fichier: supprimer.php
  // *
  // * Suppression d'un étudiant dans la base de données
  // ***************************************************************************

  // Inclusion du fichier de configuration pour simplifier et éviter la redondance du code
  include 'config.php';

  // Récupération du mail de l'étudiant via url
  $mail_etudiant = $_GET['mail'];

  echo '<div class="alert alert-danger container" id="half-size" role="alert">Etes vous sûr de supprimer cet étudiant : '.$mail_etudiant.' ?<br>';
    echo '<a href="back.php">
            <button type="button" class="btn btn-danger ">
            <span class="fa fa-close fa-lg" aria-hidden="true"></span> Annuler
            </button>
          </a>';

    echo '<a href="supprimer.php?mail='.$mail_etudiant.'&click=1">
            <button type="button" class="btn btn-success ">
            <span class="fa fa-close fa-lg" aria-hidden="true"></span> Valider
            </button>
          </a>';
  echo '</div>';

  if (isset($_GET["click"]))
  {
    $mail_etudiant = $_GET['mail'];
    $delete = $pdo->prepare("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");

    if ($delete->execute(array(':mail'=>$mail_etudiant))) {
      // echo "Suppression de $mail_etudiant dans la base de données réussie";
    }
    else {
      echo "Problème lors de la suppression de $mail_etudiant dans la base de données";
    }
    header('Location:back.php'); // A vérifier
  }

  unset($pdo);
?>
