<?php

// Défini le chemin de ce fichier
// Obligatoire, doit représenter exactement le chemin du fichier en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require
// On indique ici le namespace de la classe qu'on veut utiliser et Symfony + composer font le require automatiquement
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \DateTime;
use Symfony\Component\HttpFoundation\Request;

class CocktailsController extends AbstractController
{

    // Création d'une fonction qui appelle le tableau
    public function getCocktails()
    {
        return [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'https://i0.wp.com/cuisinovores.com/wp-content/uploads/2025/04/photo_cocktail_mojito_cuisinovores.webp?fit=500%2C500&ssl=1', // photo libre de droits
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],
            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'https://cocktailmolotov.org/wp-content/uploads/2012/04/Margarita-1.jpg',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],
            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'https://s3-eu-west-1.amazonaws.com/images-ca-1-0-1-eu/recipe_photos/original/209466/old-fashioned-cocktail-AdobeStock_222874229.jpg',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],
            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'https://www.oldnick.fr/wp-content/uploads/2020/02/cocktail-pina-colada-scaled.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],
            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'https://ginsiders.com/wp-content/uploads/2024/08/Ginsiders-recettes-1.jpg',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
        ];
    }

    // URL pour la page affichant tout les cocktails
    #[Route('/cocktails', name: 'list-cocktails')]

    // Permet d'afficher tout les cocktails
    public function listCocktails()
    {
        // On stocke la fonction qui appelle le tableau dans une variable
        $cocktails = $this->getCocktails();

        // On appelle la variable qui contient le tableau dans la page twig
        return $this->render('cocktails-list.html.twig', ['cocktails' => $cocktails]);
    }

    // URL pour la page d'un cocktail en particulier
    //{id} permet d'afficher l'id du cocktail sur lequel on clique dans l'url
    #[Route('/cocktail', name: 'cocktail-show')]

    // dans la fonction displaySingleCocktails, crééé un parametre $request. Si j'ajoute devant ce parametre le nom 
    // d'une classe existante ça demande à symfony de créer une instance de cette (new NomDeLaClasse)
	// automatiquement dans la variable $request
	// c'est ce qu'on appelle l'autowire (cablage automatique)
    public function cocktailShow(Request $request)
    {
        $cocktails = $this->getCocktails();

        // j'utilise l'instance de la classe Request créé par symfony
		// j'utilise la propriété query pour accéder aux données GET
		// j'utilise la fonction ->get pour récupérer un parametre en particulier
        $cocktailId= $request->query->get('id');

        $cocktail = $cocktails[$cocktailId];

        // permet de récupérer le bon cocktail qui correspond à l'id donné dans le tableau
        return $this->render('cocktail-show.html.twig', ['cocktail' => $cocktail]);
    }
}
