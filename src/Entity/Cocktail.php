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

    public function __construct($name, $ingredients, $description, $image) {

        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->description = $description;
        $this->image = $image;

        $this->createdAt = new DateTime();
        $this->isPublished = true;
        $this->id = 6;
    }
}