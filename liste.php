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

  echo '<td bgcolor="#669999"><b><u>Date Naissance</u></b></td>';

  echo '<td bgcolor="#669999"><b><u>Classe</u></b></td>';


  echo '</tr>'."\n";

  for($i=0; $tab_etudiant = $query->fetchObject('Etudiant');$i++)
  {
    echo '<tr>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getMail().'</td>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getNom().'</td>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getPrenom().'</td>';
    $id = $tab_etudiant->getPrenom();

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getDateNaissance().'</td>';

    echo '<td bgcolor="#CCCCCC">'.$tab_etudiant->getSection().'</td>';

    echo "<td><a href='supprimer.php?id=$id'>supprimer</td>";

    echo '</tr>'."\n";
  }
  echo '</table>'."\n";

  unset($pdo);


  echo '<form method="post" action="post.php">';
  echo '<fieldset>';
  echo '<legend>Créer un nouvel étudiant</legend>';

  echo '<p>';
  echo 'Mail : '.'<input type="email" name="mail" />'."<br>";
  echo 'Nom : '.'<input type="text" name="nom" />'."<br>";
  echo 'Prenom : '.'<input type="text" name="prenom" />'."<br>";
  echo 'Date de naissance : '.'<input type="date" name="date_naissance" />'.' AAAA-MM-JJ'."<br>";
  echo 'Section : '.'<select name="section"><option value="CIR1">CIR1</option><option value="CIR2">CIR2</option></select>'."<br>";

  echo '<input type="submit" value="Valider" />';

  echo '</p>';
  echo '</fieldset>';
  echo '</form>';
