<?php
class Personne {
  private string $nom;
  private string $prenom;
  private DateTime $date_naissance;

  public function __construct(
    string $nom,
    string $prenom,
    string $date_naissance
  )
  {
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setDateNaissance($date_naissance);
  }

  public function getNom(): string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;
    return $this;
  }

  public function getPrenom(): string
  {
    return $this->prenom;
  }

  public function setPrenom(string $prenom): self
  {
    $this->prenom = $prenom;
    return $this;
  }

  public function getDateNaissance(): DateTime
  {
    return $this->date_naissance;
  }

  public function setDateNaissance(string $date_naissance): self
  {
    $this->date_naissance = new DateTime($date_naissance);
    return $this;
  }

  public function getAge(): int
  {
    return $this->date_naissance->diff(new DateTime())->y;
  }

  public function __toString(): string
  {
    return $this->getPrenom() . ' ' . $this->getNom() . ' (' . $this->getAge() . ' ans)';
  }
}