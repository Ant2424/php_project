<?php
  include 'config.php';

  $mail_etudiant = $_GET['mail'];
  $nom_etudiant = $_GET['nom'];
  $prenom_etudiant = $_GET['prenom'];
  $date_etudiant = $_GET['date_naissance'];
  $section_etudiant = $_GET['section'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Bonjour $mail_etudiant </center>");

  echo '<form method="post" action="postmodif.php">';
  echo '<fieldset>';
  echo '<legend>Créer un nouvel étudiant</legend>';

  echo '<p>';
  echo 'Mail : '.'<input type="email" name="mail" value="'.$mail_etudiant.'" />'."<br>";
  echo 'Nom : '.'<input type="text" name="nom" value="'.$nom_etudiant.'"/>'."<br>";
  echo 'Prenom : '.'<input type="text" name="prenom" value="'.$prenom_etudiant.'"/>'."<br>";
  echo 'Date de naissance : '.'<input type="date" name="date_naissance" value="'.$date_etudiant.'"/>'.' AAAA-MM-JJ'."<br>";
  echo 'Section : ';?><select name="section"><option value="CIR1"<?=$section_etudiant == 'CIR1' ? ' selected="selected"' : '';?>>CIR1</option><option value="CIR2"<?=$section_etudiant == 'CIR2' ? ' selected="selected"' : '';?>>CIR2</option></select><br>
  <?php

  echo '<input type="submit" value="Valider" />';

  echo '</p>';
  echo '</fieldset>';
  echo '</form>';
