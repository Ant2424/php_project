<?php
  // ***************************************************************************
  // * Mini projet PHP proposé par Christophe Vignaud
  // *
  // * Antoine Auffret et Virgile Prin
  // * ISEN-Brest CIR2 2016-2017
  // *
  // * Date : 1er mai 2017
  // * Version : 1.0
  // *
  // * Fichier: modifier.php
  // *
  // * Modification d'un étudiant
  // ***************************************************************************

  // Inclusion du fichier de configuration pour simplifier et éviter la redondance du code
  include 'config.php';

  // Récupération du mail, du nom, du prénom, de la date de naissance et de la classe de l'étudiant via url
  $mail_etudiant = $_GET['mail'];
  $nom_etudiant = $_GET['nom'];
  $prenom_etudiant = $_GET['prenom'];
  $date_etudiant = $_GET['date_naissance'];
  $section_etudiant = $_GET['section'];

  // Lien vers la page d'accueil
  echo '<a href="back.php">retour accueil</a>';
  print("<center>Bonjour $mail_etudiant </center>");

  // Pré-remplissage du formulaire contenant les informations de l'étudiant
  echo '<form method="post" action="postmodif.php">';
    echo '<fieldset>';
      echo '<legend>Créer un nouvel étudiant</legend>';
      echo '<p>';
        echo 'Mail : '.'<input type="email" name="mail" value="'.$mail_etudiant.'" />'."<br>";
        echo 'Nom : '.'<input type="text" name="nom" value="'.$nom_etudiant.'"/>'."<br>";
        echo 'Prenom : '.'<input type="text" name="prenom" value="'.$prenom_etudiant.'"/>'."<br>";
        echo 'Date de naissance : '.'<input type="date" name="date_naissance" value="'.$date_etudiant.'"/>'.' AAAA-MM-JJ'."<br>";
        echo 'Section : ';?><select name="section"><option value="CIR1"<?=$section_etudiant == 'CIR1' ? ' selected="selected"' : '';?>>CIR1</option><option value="CIR2"<?=$section_etudiant == 'CIR2' ? ' selected="selected"' : '';?>>CIR2</option></select><br><?php
        echo '<input type="submit" value="Valider" />';
      echo '</p>';
    echo '</fieldset>';
  echo '</form>';
?>
