<?php

class Etudiant
{
  private $mail;
  private $nom;
  private $prenom;
  private $date_naissance;
  private $section;

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
