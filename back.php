<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';

  print("<center><b>Back office</b></center>");

  // Sélectionne tous les étudiants de la base de données

  $query = $pdo->prepare("SELECT * FROM etudiant");
  $query->execute();

  // Affichage des différentes colonnes des étudiants de la base de données

  echo '<table bgcolor="#FFFFFF">'."\n";
    echo '<tr>';
      echo '<td bgcolor="#669999"><b><u>Mail</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';
      echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';
    echo '</tr>'."\n";

    // Affichage des étudiants un par un avec une boucle for

    for($i=0; $tab_etudiant = $query->fetchObject('Etudiant');$i++)
    {
      // Récupération et attribution des différents données de chaque étudiant dans des variables pour faciliter leurs utilisations

      $mail_etudiant = $tab_etudiant->getMail();
      $nom_etudiant = $tab_etudiant->getNom();
      $prenom_etudiant = $tab_etudiant->getPrenom();
      $date_etudiant = $tab_etudiant->getDateNaissance();
      $section_etudiant = $tab_etudiant->getSection();

      echo '<tr>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';

        // Création de trois liens contenant les données nécessaire pour supprimer, afficher les détails et modifier les informations de l'étudiant sélectionné dans l'url

        echo "<td><a href='supprimer.php?mail=$mail_etudiant'>supprimer</td>";
        echo "<td><a href='details.php?mail=$mail_etudiant'>détails</td>";
        echo "<td><a href='modifier.php?mail=$mail_etudiant&nom=$nom_etudiant&prenom=$prenom_etudiant&date_naissance=$date_etudiant&section=$section_etudiant'>modifier</td>";
      echo '</tr>'."\n";
    }
  echo '</table>'."\n";

  unset($pdo);

  // Lien permettant de créer un nouvel étudiant

  echo '<a href="creer.php">Nouvel étudiant</a>';
