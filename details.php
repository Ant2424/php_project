<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';

  // Récupération du mail de l'étudiant via url

  $mail_etudiant = $_GET['mail'];

  // Lien vers la page d'accueil

  echo '<a href="back.php">retour accueil</a>'.'<br>';

  // Sélectionne uniquement les informations d'un étudiant via son mail unique et prépare la requête pour lutter contre l'injection de SQL

  $details = $pdo->prepare("SELECT * FROM etudiant WHERE mail = '$mail_etudiant'");

  if($details->execute()){
    echo "Affichage de l'étudiant de la base de données";
  }
  else{
    echo "Problème lors de l'affichage de l'étudiant de la base de données";
  }

  echo '<table bgcolor="#FFFFFF">'."\n";

    // Affichage des différentes colonnes et des informations d'un étudiant sélectionné de la base de données

    echo '<tr>';
      echo '<td bgcolor="#669999"><b><u>Mail</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Date Naissance</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Classe</u></b></td>';
    echo '</tr>'."\n";
    $tab_etudiant = $details->fetchObject('Etudiant');
    echo '<tr>';
      echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';
      echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';
      echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';
      echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getDateNaissance().'</td>';
      echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getSection().'</td>';
    echo '</tr>'."\n";
  echo '</table>'."\n";

  unset($pdo);
