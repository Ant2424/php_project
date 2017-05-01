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
  $annee = substr($date_etudiant,0,4);
  $mois = substr($date_etudiant,5,2);
  $jour = substr($date_etudiant,8,2);

  if (isset($_POST["nom"]))
  {
    //$mail_etudiant = $_POST['mail'];
    $nom_etudiant = $_POST['nom'];
    $prenom_etudiant = $_POST['prenom'];
    $date_etudiant = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
    $section_etudiant = $_POST['section'];

    $update = $pdo->prepare("UPDATE etudiant SET mail=:mail, nom=:nom, prenom=:prenom, date_naissance=:date_naissance, section=:section WHERE mail=:mail");
    if($update->execute(array(':mail'=>$mail_etudiant,':nom'=>$nom_etudiant,':prenom'=>$prenom_etudiant,':date_naissance'=>$date_etudiant,':section'=>$section_etudiant))){
      //echo "Insertion de $mail_etudiant dans la base de données réussie";
      header('Location:back.php');
    }
    else{
      echo '<div class ="container alert alert-danger" role="alert">Problème lors de la modification de'.$mail_etudiant.' dans la base de données</div>';
    }
  }
  echo '<div class="panel-primary container" id="half-size">';
    echo '<div class="panel-heading"><center><strong>Modification</strong></center></div>';
    echo '<div class="panel-body">';
      echo '<form class ="form-horizontal company" method="post">';
        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input class="form-control" id="disabledInput" type="email" name="mail" value="'.$mail_etudiant.'" disabled>
                </div>
              </div>';
        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="nom" value="'.$nom_etudiant.'">
                </div>
              </div>';
        echo '<div class="form-group row">
                <label class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="prenom" value="'.$prenom_etudiant.'">
                </div>
              </div>';
        echo '<div class="form-group row">
                <label  class="col-sm-2 control-label">Date de Naissance </label>
                <div class ="col-sm-10">
                  <select class="selectpicker" name="jour">';
                  for ($i=1; $i<32; $i++)
                  {
                    if($i == $jour)
                    {
                      echo '<option selected="selected">'.$i.'</option>';
                    }
                    else
                    {
                      echo '<option>'.$i.'</option>';
                    }
                  }
                  echo'</select>

                  <select class="selectpicker" name="mois">';
                  for ($i=1; $i<13; $i++)
                  {
                    if($i == $mois)
                    {
                      echo '<option selected="selected">'.$i.'</option>';
                    }
                    else
                    {
                      echo '<option>'.$i.'</option>';
                    }
                  }
                  echo '</select>

                  <select class="selectpicker" name ="annee">';
                  for ($i=1900; $i<2018; $i++)
                  {
                    if($i == $annee)
                    {
                      echo '<option selected="selected">'.$i.'</option>';
                    }
                    else
                    {
                        echo '<option>'.$i.'</option>';
                    }
                  }
                  echo '</select>
                  <small class="form-inline">JJ/MM/AAAA</small>
                </div>
              </div>';
        echo '<div class="form-group row">
                <label  class="col-sm-2 control-label">Section</label>
                <div class ="col-sm-10">
                  <select class="selectpicker" name="section">';
                  if($section_etudiant == "CIR1")
                  {
                    echo '<option selected="selected">CIR1</option>
                          <option>CIR2</option>';
                  }
                  else
                  {
                    echo '<option>CIR1</option>
                          <option selected="selected">CIR2</option>';
                  }
                  echo'</select>
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
