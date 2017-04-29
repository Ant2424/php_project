<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';



  // Sélectionne tous les étudiants de la base de données et prépare la requête pour lutter contre l'injection de SQL

  $back = $pdo->prepare("SELECT * FROM etudiant");

  if($back->execute()){
    //echo "Affichage des étudiants de la base de données";
  }
  else{
    echo "Problème lors de l'affichage des étudiants de la base de données";
  }

  // Affichage des différentes colonnes des étudiants de la base de données

  echo '<div class="panel-primary container">';

  echo '<div class="panel-heading"><strong>Back Office</strong></div>';
  echo '<div class="panel-body">';

    echo '<table class="table">';
      echo '<thead>';
        echo '<tr>';
          echo '<th>#</th>';
          echo '<th>Mail</th>';
          echo '<th>Nom</th>';
          echo '<th>Prenom</th>';
        echo'</tr>';
      echo '</thead>';
      echo '<tbody>';
    // Affichage des étudiants un par un avec une boucle for


    for($i=0; $tab_etudiant = $back->fetchObject('Etudiant');$i++)
    {
      // Récupération et attribution des différents données de chaque étudiant dans des variables pour faciliter leurs utilisations

      $mail_etudiant = $tab_etudiant->getMail();
      $nom_etudiant = $tab_etudiant->getNom();
      $prenom_etudiant = $tab_etudiant->getPrenom();
      $date_etudiant = $tab_etudiant->getDateNaissance();
      $section_etudiant = $tab_etudiant->getSection();

      echo '<tr>';

        $row = $i + 1;
        echo '<th scope="row">'.$row.'</th>';
        echo '<td>'.$tab_etudiant->getMail().'</td>';
        echo '<td>'.$tab_etudiant->getNom().'</td>';
        echo '<td>'.$tab_etudiant->getPrenom().'</td>';

        echo "<td><a href='details.php?mail=$mail_etudiant'>
                <button type='button' class='btn btn-info'><span class='fa fa-search' aria-hidden='true'></span> Détails</button>";
        echo "<a href='modifier.php?mail=$mail_etudiant&nom=$nom_etudiant&prenom=$prenom_etudiant&date_naissance=$date_etudiant&section=$section_etudiant'>
                <button type='button' class='btn btn-warning'><span class='fa fa-edit' aria-hidden='true'></span> Modifier</button>";
        echo "<a href='supprimer.php?mail=$mail_etudiant'>
                <button type='button' class='btn btn-danger'><span class='fa fa-remove' aria-hidden='true'></span> Supprimer</button>
              </td>";


      echo '</tr>'."\n";
    }

  echo '</tbody>';
  echo '</table>'."\n";

  echo '<a href="creer.php">
        <button type="button" class="btn btn-primary ">
        <span class="fa fa-plus fa-lg" aria-hidden="true"></span> Ajouter
        </button>
        </a>';



  echo '</div></div>';

  unset($pdo);

  // Lien permettant de créer un nouvel étudiant

  //echo '<a href="creer.php">Nouvel étudiant</a>';
