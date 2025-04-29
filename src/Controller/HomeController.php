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

    public function lastCocktails()
    {
        // On stocke la fonction qui appelle le tableau dans une variable
        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAllCocktails();

        // Trie les cocktails par date de création dans un ordre décroissant
        usort($cocktails, function ($a, $b) {
            // Crée des objets DateTime à partir des dates de création
            $dateA = new DateTime($a['date_creation']);
            $dateB = new DateTime($b['date_creation']);
            return $dateB <=> $dateA; // Compare les dates et les retourne dans l'ordre décroissant (plus récent au plus vieux)
        });

        // Utilisation de la méthode render qui permet de récupérer un fichier de view twig
        return $this->render('home.html.twig', [
            // Découpe le tableau 'cocktails' et prend ses 2 derniers cocktails (dans l'ordre décroissant défini au dessus)
            'cocktails' => array_slice($cocktails, 0, 2),
        ]);
    }
}
