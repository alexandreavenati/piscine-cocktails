<?php

namespace App\Entity;

use \DateTime;

class Cocktail {

    public $id;

    public $name;

    public $description;

    public $image;

    public $ingredients;

    public $createdAt;

    public $isPublished;

    public $publishedAt;

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
        $this->id = 6;
    }
}