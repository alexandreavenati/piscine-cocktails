<?php

// Défini le chemin de ce fichier
// Obligatoire, doit représenter exactement le chemin du fichier en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require
// On indique ici le namespace de la classe qu'on veut utiliser et Symfony + composer font le require automatiquement

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'categories')]

    public function showCategories()
    {
        $getCategories = new CategoriesRepository;
        $categories = $getCategories->findAllCategories();

        return $this->render('categories.html.twig', ['categories' => $categories]);
    }

    #[Route('/categorie/{id}', name: 'categorie-show')]

    public function showCategory($id)
    {
        $getCategories = new CategoriesRepository;
        $category = $getCategories->showOneCategory($id);

        return $this->render('categorie-info.html.twig', ['category' => $category]);
    }
}
