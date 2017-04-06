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

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';
    $id = $tab_etudiant->getPrenom();

    echo "<td><a href='supprimer.php?etudiant=$id'>supprimer</td>";

    echo "<td><a href='details.php?etudiant=$id'>détails</td>";

    echo "<td><a href='modifier.php?etudiant=$id'>modifier</td>";

    echo '</tr>'."\n";
  }
  echo '</table>'."\n";

  unset($pdo);

  echo '<a href="creer.php">Nouvel étudiant</a>';
