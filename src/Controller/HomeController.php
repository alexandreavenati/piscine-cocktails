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


class HomeController extends AbstractController
{
    // URL page d'accueil
    #[Route('/', name:'home')]

    // Injection automatique par Symfony de l'instance de classe CategoriesRepository grâce à l'autowiring
    public function lastCocktails(CocktailsRepository $cocktailsRepository)
    {
        // Utilisation du repository injecté pour récupérer les deux derniers cocktails triés par dates de créations
        $cocktails = $cocktailsRepository->sortCocktailsByDate();

        // Utilisation de la méthode render qui permet de récupérer un fichier de view twig
        return $this->render('home.html.twig', [
            // Découpe le tableau 'cocktails' et prend ses 2 derniers cocktails (dans l'ordre décroissant défini au dessus)
            'cocktails' => array_slice($cocktails, 0, 2),
        ]);
    }
}
