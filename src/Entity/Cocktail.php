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

    // méthode pour créer un cocktail
    public function __construct($name, $ingredients, $description, $image) {

        // valeurs envoyées par l'utilisateur
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->description = $description;
        $this->image = $image;

        // valeurs remplis automatiquement lors de l'envoi des données par l'utilisateur
        $this->createdAt = new DateTime();
        $this->isPublished = true;
        $this->id = 6;
    }
}