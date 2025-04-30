<?php

namespace App\Repository;

class CategoriesRepository {

    public function findAllCategories() {
        $categories = [
            1 => [
                "id" => 1,
                "nom" => "Cocktail",
                "description" => "Cocktails classiques avec alcool"
            ],
            2 => [
                "id" => 2,
                "nom" => "Mocktail",
                "description" => "Cocktails sans alcool"
            ],
            3 => [
                "id" => 3,
                "nom" => "Shooter",
                "description" => "Moins de 25 cl"
            ],
            4 => [
                "id" => 4,
                "nom" => "Cocktails soft",
                "description" => "Cocktails sans alcool fort"
            ],
        ];

        return $categories;
    }

    public function showOneCategory($id) {

        $categories = $this->findAllCategories();
        $category = $categories[$id];

        return $category;
    }
}