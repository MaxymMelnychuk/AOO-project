<?php
class ProduitPhysique extends Produit {
  private float $poids;

  public function __construct(
    string $nom,
    ?string $description,
    int $quantite,
    float $prix,
    float $poids
  )
  {
    parent::__construct($nom, $description, $quantite, $prix);
    $this->setPoids($poids);
  }

  public function getPoids(): float
  {
    return $this->poids;
  }

  public function setPoids(float $poids): self
  {
    $this->poids = $poids;
    return $this;
  }

  public function __toString(): string
  {
    return '<p>' . $this->getNom() . ' vaut ' . $this->getPrix() . '€ HT, soit ' . $this->getPrixTTC() . '€ TTC (' . $this->getMontantTVA() . '€ TVA)</p>'.'<p>' . $this->getNom() . ' pèse ' . $this->getPoids() . 'kg</p>';
  }

  public function __serialize(): array
  {
    return [
      'nom' => $this->getNom(),
      'description' => $this->getDescription(),
      'quantite' => $this->getQuantite(),
      'prix' => $this->getPrix(),
      'poids' => $this->getPoids(),
    ];
  } 

  public function __unserialize(array $data): void
  {
    $this->setNom($data['nom']);
    $this->setDescription($data['description']);
    $this->setQuantite($data['quantite']);
    $this->setPrix($data['prix']);
    $this->setPoids($data['poids']);
  }
  
}