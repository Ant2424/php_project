<?php

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code

  include 'config.php';
  include 'Etudiant.php';


  //print("<center><b>Front office</b></center>");

  // Sélectionne tous les étudiants de la base de données et prépare la requête pour lutter contre l'injection de SQL

  $front = $pdo->prepare("SELECT * FROM etudiant");

  if($front->execute()){
    //echo "Affichage des étudiants de la base de données";
  }
  else{
    echo "Problème lors de l'affichage de la base de données";
  }

  // Affichage des différentes colonnes des étudiants de la base de données


  echo '<div class="panel-primary container">';

  echo '<div class="panel-heading"><strong>Front Office</strong></div>';

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

    for($i=0; $tab_etudiant = $front->fetchObject('Etudiant');$i++)
    {

            echo '<tr>';

              $row = $i + 1;
              echo '<th scope="row">'.$row.'</th>';
              echo '<td>'.$tab_etudiant->getMail().'</td>';
              echo '<td>'.$tab_etudiant->getNom().'</td>';
              echo '<td>'.$tab_etudiant->getPrenom().'</td>';


            echo '</tr>'."\n";
    }
  echo '</table>'."\n";

  echo '</div></div>';

  unset($pdo);
