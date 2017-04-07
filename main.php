<?php
  include 'config.php';
  include 'Etudiant.php';

  echo '<a href="main.php">retour accueil</a>';

  $query = $pdo->prepare("SELECT * FROM etudiant");
  $query->execute();

  echo '<table bgcolor="#FFFFFF">'."\n";

  echo '<tr>';

  echo '<td bgcolor="#669999"><b><u>Mail</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';

  echo '</tr>'."\n";

  for($i=0; $tab_etudiant = $query->fetchObject('Etudiant');$i++)
  {
    echo '<tr>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';
    $mail_etudiant = $tab_etudiant->getMail();

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';
    $nom_etudiant = $tab_etudiant->getNom();

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';
    $prenom_etudiant = $tab_etudiant->getPrenom();
    $date_etudiant = $tab_etudiant->getDateNaissance();
    $section_etudiant = $tab_etudiant->getSection();

    echo "<td><a href='supprimer.php?mail=$mail_etudiant'>supprimer</td>";

    echo "<td><a href='details.php?mail=$mail_etudiant'>détails</td>";

    echo "<td><a href='modifier.php?mail=$mail_etudiant&nom=$nom_etudiant&prenom=$prenom_etudiant&date_naissance=$date_etudiant&section=$section_etudiant'>modifier</td>";

    echo '</tr>'."\n";
  }
  echo '</table>'."\n";

  unset($pdo);

  echo '<a href="creer.php">Nouvel étudiant</a>';
