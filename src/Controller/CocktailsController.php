<?php

// Défini le chemin de ce fichier
// Obligatoire, doit représenter exactement le chemin du fichier en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require
// On indique ici le namespace de la classe qu'on veut utiliser et Symfony + composer font le require automatiquement

use App\Entity\Cocktail;
use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;
use Symfony\Component\HttpFoundation\Request;

class CocktailsController extends AbstractController
{
    // URL pour la page affichant tout les cocktails
    #[Route('/cocktails', name: 'list-cocktails')]

    // Permet d'afficher tout les cocktails
    // Injection automatique par Symfony de l'instance de classe CategoriesRepository grâce à l'autowiring
    public function listCocktails(CocktailsRepository $cocktailsRepository)
    { 

        // On stocke la fonction qui appelle le tableau dans une variable
        // Utilisation du repository injecté pour récupérer tout les cocktails
        $cocktails = $cocktailsRepository->findAllCocktails();

        // On appelle la variable qui contient le tableau dans la page twig
        return $this->render('cocktails-list.html.twig', ['cocktails' => $cocktails]);
    }

    // URL pour la page d'un cocktail en particulier
    //{id} permet d'afficher l'id du cocktail sur lequel on clique dans l'url
    #[Route('/cocktail/{id}', name: 'cocktail-show')]

    // La partie {id} de l'URL est transmise automatiquement en paramètre lorsqu'on clique
    // Injection automatique par Symfony de l'instance de classe CategoriesRepository grâce à l'autowiring
    public function cocktailShow(CocktailsRepository $cocktailsRepository, $id)
    {

        // Utilisation du repository injecté pour récupérer un cocktail spécifique grâce à son id
        $cocktail = $cocktailsRepository->findOneById($id);

        // $id ici permet permet de récupérer le bon cocktail qui correspond à l'id donné dans le tableau
        return $this->render('cocktail-show.html.twig', ['cocktail' => $cocktail]);
    }

    #[Route('/creer-cocktail', name:'create-cocktail')]

    public function createCocktail(Request $request) {

        $cocktail = null;

        if($request->isMethod('POST')){

            $name = $request->request->get('name');
            $ingredients = $request->request->get('ingredients');
            $description = $request->request->get('description');
            $image = $request->request->get('image');
            $createdAt = $request->request->get('creation_date');

            $cocktail = new Cocktail($name, $ingredients, $description, $image, $createdAt);
        }
        
        return $this->render('create-cocktail.html.twig', ['cocktail' => $cocktail]);
    }
}
