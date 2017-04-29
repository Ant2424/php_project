<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';

  // Récupération du mail de l'étudiant via url

  $mail_etudiant = $_GET['mail'];

  // Sélectionne uniquement les informations d'un étudiant via son mail unique et prépare la requête pour lutter contre l'injection de SQL

  $details = $pdo->prepare("SELECT * FROM etudiant WHERE mail = '$mail_etudiant'");

  if($details->execute()){
    //echo "Affichage de l'étudiant de la base de données";
  }
  else{
    echo "Problème lors de l'affichage de l'étudiant de la base de données";
  }

  // Affichage des différentes colonnes et des informations d'un étudiant sélectionné de la base de données

  $tab_etudiant = $details->fetchObject('Etudiant');

  echo '<div class="panel-primary container">';

  echo '<div class="panel-heading"><strong>Détails</strong></div>';

    echo '<div class="panel-body">';

      echo '<table class="table">';
        echo '<thead>';
          echo '<tr>';
            echo '<th>Mail</th>';
            echo '<th>Nom</th>';
            echo '<th>Prenom</th>';
            echo '<th>Date de naissance </th>';
          echo'</tr>';
        echo '</thead>';
        echo '<tbody>';


  echo '<tr>';

    echo '<td>'.$tab_etudiant->getMail().'</td>';
    echo '<td>'.$tab_etudiant->getNom().'</td>';
    echo '<td>'.$tab_etudiant->getPrenom().'</td>';
    echo '<td>'.$tab_etudiant->getDateNaissance().'</td>';
    echo '<td>'.$tab_etudiant->getSection().'</td>';


  echo '</tr>'."\n";
echo '</table>'."\n";

// Boutton de retour vers le back office

echo '<a href="back.php">
        <button type="button" class="btn btn-primary ">
        <span class="fa fa-home fa-lg" aria-hidden="true"></span> Retour
        </button>
        </a>';

echo '</div></div>';


unset($pdo);
