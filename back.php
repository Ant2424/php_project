<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';

  echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
  echo '<link href="css/bootstrap-theme.min.css" rel="stylesheet">';


  //print("<center><b>Back office</b></center>");

  // Sélectionne tous les étudiants de la base de données et prépare la requête pour lutter contre l'injection de SQL

  $back = $pdo->prepare("SELECT * FROM etudiant");

  if($back->execute()){
    //echo "Affichage des étudiants de la base de données";
  }
  else{
    echo "Problème lors de l'affichage des étudiants de la base de données";
  }

  // Affichage des différentes colonnes des étudiants de la base de données

  echo '<div class="panel panel-primary container">';

  echo '<div class="panel-heading">Back Office</div>';
  echo '<div class="panel-body">';
  /*echo '<table bgcolor="#FFFFFF">'."\n";
    echo '<tr>';
      echo '<td bgcolor="#669999"><b><u>Mail</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';
    echo '</tr>'."\n";*/

    echo '<table class="table">';
      echo '<thead>';
        echo '<tr>';
          echo '<th>#</th>';
          echo '<th>Mail</th>';
          echo '<th>Nom</th>';
          echo '<th>Prenom</th>';
        echo'</tr>';
      echo '</thead>';
      echo '<tbody>';
    // Affichage des étudiants un par un avec une boucle for


    for($i=0; $tab_etudiant = $back->fetchObject('Etudiant');$i++)
    {
      // Récupération et attribution des différents données de chaque étudiant dans des variables pour faciliter leurs utilisations

      $mail_etudiant = $tab_etudiant->getMail();
      $nom_etudiant = $tab_etudiant->getNom();
      $prenom_etudiant = $tab_etudiant->getPrenom();
      $date_etudiant = $tab_etudiant->getDateNaissance();
      $section_etudiant = $tab_etudiant->getSection();

      echo '<tr>';
        /*echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';

        // Création de trois liens contenant les données nécessaire pour supprimer, afficher les détails et modifier les informations de l'étudiant sélectionné dans l'url

        echo "<td><a href='supprimer.php?mail=$mail_etudiant'>supprimer</td>";
        echo "<td><a href='details.php?mail=$mail_etudiant'>détails</td>";
        echo "<td><a href='modifier.php?mail=$mail_etudiant&nom=$nom_etudiant&prenom=$prenom_etudiant&date_naissance=$date_etudiant&section=$section_etudiant'>modifier</td>";*/
        $row = $i + 1;
        echo '<th scope="row">'.$row.'</th>';
        echo '<td>'.$tab_etudiant->getMail().'</td>';
        echo '<td>'.$tab_etudiant->getNom().'</td>';
        echo '<td>'.$tab_etudiant->getPrenom().'</td>';

        echo "<td><a href='supprimer.php?mail=$mail_etudiant'>supprimer</td>";
        echo "<td><a href='details.php?mail=$mail_etudiant'>détails</td>";
        echo "<td><a href='modifier.php?mail=$mail_etudiant&nom=$nom_etudiant&prenom=$prenom_etudiant&date_naissance=$date_etudiant&section=$section_etudiant'>modifier</td>";



      echo '</tr>'."\n";
    }

    echo '<tr><a href="creer.php">Nouvel étudiant</a></tr>';

  echo '</table>'."\n";

  echo '</div></div>';

  unset($pdo);

  // Lien permettant de créer un nouvel étudiant

  //echo '<a href="creer.php">Nouvel étudiant</a>';

  echo'<script src="js/bootstrap.min.js"></script>';
