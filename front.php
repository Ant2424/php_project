<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';

  print("<center><b>Front office</b></center>");

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
      echo '<tr>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';
        echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';
      echo '</tr>'."\n";
    }
  echo '</table>'."\n";

  unset($pdo);
