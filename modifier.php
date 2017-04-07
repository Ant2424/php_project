<?php
  include 'config.php';

  $mail_etudiant = $_GET['mail'];
  $nom_etudiant = $_GET['nom'];
  $prenom_etudiant = $_GET['prenom'];
  $date_etudiant = $_GET['date_naissance'];
  $section_etudiant = $_GET['section'];

  // jécris un truc

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Bonjour $mail_etudiant </center>");

  echo '<form method="post" action="post.php">';
  echo '<fieldset>';
  echo '<legend>Créer un nouvel étudiant</legend>';

  echo '<p>';
  echo 'Mail : '.'<input type="email" name="mail" value="'.$mail_etudiant.'" />'."<br>";
  echo 'Nom : '.'<input type="text" name="nom" value="'.$nom_etudiant.'"/>'."<br>";
  echo 'Prenom : '.'<input type="text" name="prenom" value="'.$prenom_etudiant.'"/>'."<br>";
  echo 'Date de naissance : '.'<input type="date" name="date_naissance" value="'.$date_etudiant.'"/>'.' AAAA-MM-JJ'."<br>";
  echo 'Section : '.'<select name="section"><option value="'.$section_etudiant.'">$section_etudiant</option><option value="CIR2">CIR2</option></select>'."<br>";

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
