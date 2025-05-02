<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

#[ORM\Entity()]
class CocktailCategory {

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

    // colonne de type datetime
    #[ORM\Column(type: 'datetime')]
    // DateTime = type datetime
    public DateTime $createdAt;
}
