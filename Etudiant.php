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
  // * Fichier: Etudiant.php
  // *
  // * Définition de la classe Etudiant et des méthodes getters et setters
  // ***************************************************************************

  class Etudiant
  {
    private $mail;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $section;

    // Méthodes getters
    public function getMail()
    {
      return $this->mail;
    }
    public function getNom()
    {
      return $this->nom;
    }
    public function getPrenom()
    {
      return $this->prenom;
    }
    public function getDateNaissance()
    {
      return $this->date_naissance;
    }
    public function getSection()
    {
      return $this->section;
    }

    // Méthodes setters
    public function setMail($mail)
    {
      $this->mail = $mail;
    }
    public function setNom($nom)
    {
      $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
      $this->prenom = $prenom;
    }
    public function setDateNaissance($date_naissance)
    {
      $this->date_naissance = $date_naissance;
    }
    public function setSection($section)
    {
      $this->section = $section;
    }
  }
?>
