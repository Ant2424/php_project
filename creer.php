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
  // * Fichier: creer.php
  // *
  // * Création d'un étudiant
  // ***************************************************************************

  // Inclusion du fichier de configuration et de la classe Etudiant pour simplifier et éviter la redondance du code
  include 'config.php';
  include 'Etudiant.php';

  // Lien vers la page d'accueil

  if (isset($_POST["mail"]))
  {
    $mail_etudiant = $_POST['mail'];
    $nom_etudiant = $_POST['nom'];
    $prenom_etudiant = $_POST['prenom'];
    $date_etudiant = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
    $section_etudiant = $_POST['section'];

    $insert = $pdo->prepare("INSERT INTO etudiant(mail, nom, prenom, date_naissance, section) VALUES(:mail,:nom,:prenom,:date_naissance,:section)");

    if($insert->execute(array(':mail'=>$mail_etudiant,':nom'=>$nom_etudiant,':prenom'=>$prenom_etudiant,':date_naissance'=>$date_etudiant,':section'=>$section_etudiant))){
      //echo "Insertion de $mail_etudiant dans la base de données réussie";
      header('Location:back.php');
    }
    else{
      //echo "Problème lors de l'insertion de $mail_etudiant dans la base de données";
      echo '<div class ="container alert alert-danger" role="alert">Problème lors de l\'insertion de'.$mail_etudiant.' dans la base de données</div>';
    }
  }

  echo '<div class="panel-primary container" id="half-size">';
    echo '<div class="panel-heading"><center><strong>Création</strong></center></div>';
    echo '<div class="panel-body">';
      echo '<form class ="form-horizontal company" method="post" >';
        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input class="form-control" type="email" name="mail" required>
                </div>
              </div>';

        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="nom" required>
                </div>
              </div>';

        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="prenom" required>
                </div>
              </div>';

        echo '<div class="form-group row">
                <label  class="col-sm-2 control-label">Date de Naissance </label>
                <div class ="col-sm-10">
                  <select class="selectpicker" name="jour">';
                    for ($i=1; $i<32; $i++)
                    {
                      echo '<option>'.$i.'</option>';
                    }
                  echo'</select>

                  <select class="selectpicker" name="mois">';
                    for ($i=1; $i<13; $i++)
                    {
                      echo '<option>'.$i.'</option>';
                    }
                  echo '</select>

                  <select class="selectpicker" name ="annee">';
                    for ($i=1900; $i<2018; $i++)
                    {
                      echo '<option>'.$i.'</option>';
                    }
                  echo '</select>
                  <small class="form-inline">JJ/MM/AAAA</small>
                </div>
              </div>';

        echo '<div class="form-group row">
                <label  class="col-sm-2 control-label">Section</label>
                <div class ="col-sm-10">
                  <select class="selectpicker" name="section">
                    <option>CIR1</option>
                    <option>CIR2</option>
                  </select>
                </div>
              </div>';

        echo'<button type="submit" class="btn btn-success pull-right">
               <span class="fa fa-check fa-lg" aria-hidden="true"></span> Valider
             </button>';

        echo '<a href="back.php">
                <button type="button" class="btn btn-danger pull-left">
                  <span class="fa fa-close fa-lg" aria-hidden="true"></span> Annuler
                </button>
              </a>';
      echo'</form>
    </div>
  </div>';
?>
