<?php
class Produit {
  private string $nom;
  private ?string $description;
  private int $quantite;
  private float $prix;
  const TAXE = 1.2;

  public function __construct(
    string $nom,
    ?string $description,
    int $quantite,
    float $prix
  )
  {
    $this->setNom($nom);
    $this->setDescription($description);
    $this->setQuantite($quantite);
    $this->setPrix($prix);
  }
 
  // Setters et Getters
  public function setNom(string $value): self
  {
    $this->nom = $value;
    return $this;
  }
  public function getNom(): string
  {
    return $this->nom;
  }
 
  public function setDescription(?string $value): self
  {
    $this->description = $value;
    return $this;
  }
  public function getDescription(): ?string
  {
    return $this->description;
  }
 
  public function setQuantite(int $value): self
  {
    $this->quantite = $value;
    return $this;
  }
  public function getQuantite(): int
  {
    return $this->quantite;
  }
 
  public function setPrix(float $value): self
  {
    $this->prix = $value;
    return $this;
  }
  public function getPrix(): float
  {
    return $this->prix;
  }
  public function getPrixTTC(): float
  {
    return $this->prix * self::TAXE;
  }

  public function getMontantTVA(): float
  {
    return $this->getPrixTTC() - $this->getPrix();
  }

  public function __serialize(): array
  {
    return [
      'nom' => $this->getNom(),
      'description' => $this->getDescription(),
      'quantite' => $this->getQuantite(),
      'prix' => $this->getPrix(),
    ];
  }

  public function __unserialize(array $data): void
  {
    $this->setNom($data['nom']);
    $this->setDescription($data['description']);
    $this->setQuantite($data['quantite']);
    $this->setPrix($data['prix']);
  }
}