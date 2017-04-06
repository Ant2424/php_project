<?php
  include 'config.php';
  include 'Etudiant.php';

  $mail_etudiant = $_GET['mail'];

  echo '<a href="main.php">retour accueil</a>';

  $query = $pdo->prepare("SELECT * FROM etudiant WHERE mail = '$mail_etudiant'");
  $query->execute();

  echo '<table bgcolor="#FFFFFF">'."\n";

  echo '<tr>';

  echo '<td bgcolor="#669999"><b><u>Mail</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Nom</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Prenom</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Date Naissance</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Classe</u></b></td>';

  echo '</tr>'."\n";

  $tab_etudiant = $query->fetchObject('Etudiant');

  echo '<tr>';

  echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';

  echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';

  echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';

  echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getDateNaissance().'</td>';

  echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getSection().'</td>';

  echo '</tr>'."\n";

  echo '</table>'."\n";

  unset($pdo);
