<?php

// Défini le chemin de ce fichier
// Obligatoire, doit représenter exactement le chemin du fichier en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require
// On indique ici le namespace de la classe qu'on veut utiliser et Symfony + composer font le require automatiquement
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CategoriesController extends AbstractController
{

    public function categories(){

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
    
    #[Route('/categories', name: 'categories')]

    public function showCategories()
    {
        $categories = $this->categories();

        return $this->render('categories.html.twig', ['categories' => $categories]);
    }

    #[Route('/categorie/{id}', name: 'categorie-show')]

    public function showCategory($id)
    {
        $categories = $this->categories();

        return $this->render('categorie-info.html.twig', ['category' => $categories[$id]]);
    }
}
