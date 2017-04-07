<?php
  include 'config.php';

  $mail_etudiant = $_GET['mail'];
  $Nom = $_GET['nom'];
  $Prenom = $_GET['prenom'];
  $Date_naissance = $_GET['date_naissance'];
  $Section = $_GET['section'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Bonjour $mail_etudiant </center>");

  echo '<form method="post" action="post.php">';
  echo '<fieldset>';
  echo '<legend>Créer un nouvel étudiant</legend>';

  echo '<p>';
  echo 'Mail : '.'<input type="email" name="mail" value="'.$mail_etudiant.'" />'."<br>";
  echo 'Nom : '.'<input type="text" name="nom" />'."<br>";
  echo 'Prenom : '.'<input type="text" name="prenom" />'."<br>";
  echo 'Date de naissance : '.'<input type="date" name="date_naissance" />'.' AAAA-MM-JJ'."<br>";
  echo 'Section : '.'<select name="section"><option value="CIR1">CIR1</option><option value="CIR2">CIR2</option></select>'."<br>";

  echo '<input type="submit" value="Valider" />';

  echo '</p>';
  echo '</fieldset>';
  echo '</form>';

  //$query = $pdo->prepare(" SELECT * FROM etudiant ");

  /*$update = $pdo->prepare("UPDATE etudiant(mail, nom, prenom, date_naissance, section) SET(:mail,:nom,:prenom,:date_naissance,:section)");
  if($update->execute(array(':mail'=>$Mail,':nom'=>$Nom,':prenom'=>$Prenom,':date_naissance'=>$Date_naissance,':section'=>$Section))){
    echo "modification réussie";
  }
  else{
    echo "probleme modification";
  }*/


  unset($pdo);
