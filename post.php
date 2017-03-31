<?php
  include 'config.php';

  $Mail = $_POST['mail'];
  $Nom = $_POST['nom'];
  $Prenom = $_POST['prenom'];
  $Date_naissance = $_POST['date_naissance'];
  $Section = $_POST['section'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Bonjour $Prenom </center>");

  //$query = $pdo->prepare(" SELECT * FROM etudiant ");

  $insert = $pdo->prepare("INSERT INTO etudiant(mail, nom, prenom, date_naissance, section) VALUES(:mail,:nom,:prenom,:date_naissance,:section)");
  if($insert->execute(array(':mail'=>$Mail,':nom'=>$Nom,':prenom'=>$Prenom,':date_naissance'=>$Date_naissance,':section'=>$Section))){
    echo "insertion réussie";
  }
  else{
    echo "probleme insertion";
  }


  unset($pdo);
