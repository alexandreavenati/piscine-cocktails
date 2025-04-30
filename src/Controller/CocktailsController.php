<?php

// Défini le chemin de ce fichier
// Obligatoire, doit représenter exactement le chemin du fichier en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require
// On indique ici le namespace de la classe qu'on veut utiliser et Symfony + composer font le require automatiquement

use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;

class CocktailsController extends AbstractController
{
    // URL pour la page affichant tout les cocktails
    #[Route('/cocktails', name: 'list-cocktails')]

    // Permet d'afficher tout les cocktails
    public function listCocktails()
    { 
        // je crée une instance de classe avec CocktailsRepository et la stocke dans une variable
        $cocktailsRepository = new CocktailsRepository;

        // On stocke la fonction qui appelle le tableau dans une variable
        $cocktails = $cocktailsRepository->findAllCocktails();

        // On appelle la variable qui contient le tableau dans la page twig
        return $this->render('cocktails-list.html.twig', ['cocktails' => $cocktails]);
    }

    // URL pour la page d'un cocktail en particulier
    //{id} permet d'afficher l'id du cocktail sur lequel on clique dans l'url
    #[Route('/cocktail/{id}', name: 'cocktail-show')]

    // La partie {id} de l'URL est transmise automatiquement en paramètre lorsqu'on clique
    public function cocktailShow($id)
    {

        $cocktailsRepository = new CocktailsRepository;
        $cocktail = $cocktailsRepository->findOneById($id);

        // $id ici permet permet de récupérer le bon cocktail qui correspond à l'id donné dans le tableau
        return $this->render('cocktail-show.html.twig', ['cocktail' => $cocktail]);
    }

}
