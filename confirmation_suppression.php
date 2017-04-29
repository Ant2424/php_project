<?php

  include 'config.php';
  $mail_etudiant = $_GET['mail'];
echo '<div class="alert alert-danger container" role="alert">Etes vous sûr de supprimer cet utilisateur ?<br>';

echo '<a href="back.php">
      <button type="button" class="btn btn-primary ">
      <span class="fa fa-home fa-lg" aria-hidden="true"></span> Retour
      </button>
      </a>';

echo '<a href="confirmation_suppression.php?click=1">
      <button type="button" class="btn btn-success ">
      <span class="fa fa-check fa-lg" aria-hidden="true"></span> Valider
      </button>
      </a></div>';

if (isset($_GET["click"])) {

        $mail_etudiant = $_GET['mail'];
        $delete = $pdo->prepare("DELETE FROM etudiant WHERE mail = '$mail_etudiant'");

        $delete->execute();

        if($delete->execute(array(':mail'=>$mail_etudiant))){
          echo "Suppression de $mail_etudiant dans la base de données réussie";
        }
        else{
          echo "Problème lors de la suppression de $mail_etudiant dans la base de données";
        }
        //header('Location: back.php');
        unset($pdo);
}
exit();

?>
