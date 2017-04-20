<?php
  include 'config.php';

  $mail_etudiant = $_POST['mail'];
  $nom_etudiant = $_POST['nom'];
  $prenom_etudiant = $_POST['prenom'];
  $date_etudiant = $_POST['date_naissance'];
  $section_etudiant = $_POST['section'];

  echo '<a href="main.php">retour accueil</a>';

  print("<center>Bonjour $mail_etudiant </center>");

  $update = $pdo->prepare("UPDATE etudiant SET mail=:mail, nom=:nom, prenom=:prenom, date_naissance=:date_naissance, section=:section WHERE mail=:mail");
  if($update->execute(array(':mail'=>$mail_etudiant,':nom'=>$nom_etudiant,':prenom'=>$prenom_etudiant,':date_naissance'=>$date_etudiant,':section'=>$section_etudiant))){
    echo "modification des informations de $mail_etudiant réussie";
  }
  else{
    echo "probleme lors de la modification de $mail_etudiant dans la base de données";
  }

  unset($pdo);
