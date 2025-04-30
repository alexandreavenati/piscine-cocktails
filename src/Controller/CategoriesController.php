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

    // Injection automatique par Symfony de l'instance de classe CategoriesRepository grâce à l'autowiring
    public function showCategories(CategoriesRepository $categoriesRepository)
    {
        // Utilisation du repository injecté pour récupérer toutes les catégories
        $categories = $categoriesRepository->findAllCategories();

        return $this->render('categories.html.twig', ['categories' => $categories]);
    }

    #[Route('/categorie/{id}', name: 'categorie-show')]

    // Injection automatique par Symfony de l'instance de classe CategoriesRepository grâce à l'autowiring
    public function showCategory(CategoriesRepository $categoriesRepository, $id)
    {
         // Utilisation du repository injecté pour récupérer une catégorie spécifique grâce à son id
        $category = $categoriesRepository->showOneCategory($id);

        return $this->render('categorie-info.html.twig', ['category' => $category]);
    }
}
