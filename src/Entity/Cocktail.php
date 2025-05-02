<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;
use \DateTimeInterface;

// Lie à un tableau de la base de données
#[ORM\Entity()]
class Cocktail {

    // clé primaire
    #[ORM\Id]
    // incrémentation automatique
    #[ORM\GeneratedValue]
    // crée une colonne dans le tableau
    #[ORM\Column]
    // ?int = type integer
    public ?int $id;

    // colonne varchar avec limite de 255 caractères
    #[ORM\Column(length: 255)]
    // ?int = type string
    public ?string $name;

    #[ORM\Column(length: 255)]
    public ?string $description;

    #[ORM\Column(length: 255)]
    public ?string $image;

    #[ORM\Column(length: 255)]
    public ?string $ingredients;

    // colonne de type datetime
    #[ORM\Column(type: 'datetime')]
    // DateTime = type datetime
    public DateTime $createdAt;

    // colonne de type booléenne
    #[ORM\Column(type: 'boolean')]
    // bool = type boolean
    public bool $isPublished;

    #[ORM\Column(type: 'datetime')]
    public DateTimeInterface $publishedAt;

    // méthode pour créer un cocktail
    public function __construct($name, $ingredients, $description, $image, $createdAt) {

        // valeurs envoyées par l'utilisateur
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->description = $description;
        $this->image = $image;
        $this->createdAt = $createdAt;

        // valeurs remplis automatiquement lors de l'envoi des données par l'utilisateur
        $this->publishedAt = new DateTime();
        $this->isPublished = true;
    }
}