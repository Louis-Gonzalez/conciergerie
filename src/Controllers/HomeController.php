<?php

// On déclare de l'espace 
namespace App\TpFinPhp\Controllers;

// On déclare la class nécessaire 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * gère la route de la page d'accueil
 * 
 */
// On déclare la classe HomeController
class HomeController
{
    /**
     * gère la route de la page d'accueil
     * @var string $message1
     * @var string $message2
     * @return $message1 et $message2 dans la vue twig homepage
     * dirige vers la homepage
     */
    // On délcare la fonction index
    public function index()
    {
        /**
         * On affiche la page d'accueil
         * @var string $message1
         * @var string $message2
         * @var string $name
         * @return $message1 et $message2 dans la vue twig homepage
         */
        
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 

        // Initialiser twig 
        $twig = new Environment($loader);

        $message1 = ['Créer une tâche qui est réalisable'];
        $message2 = ['Pense à la temporalité de réalisation e la tâche'];
        // Rendre une vue
        echo $twig->render('homepage.twig', [
                                                'name' => 'Seraphin_BAX',
                                                'message1' => $message1,
                                                'message2' => $message2
                                            ]);
    }
}