<?php

// On déclare de l'espace
namespace App\TpFinPhp\Controllers;

// On appelle les class
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\TpFinPhp\Services\Database;
use App\TpFinPhp\Services\Utils;

/**
 * Abstrait les controllers
 */
abstract class AbstractController
{
    /**
     * La méthode affiche les vues twigs
     *
     * @param string $template
     * @param array $data
     * @return void
     */
    // protected : c'est des fonction qui sont utilisable seulement par les enfants de la classe
    protected function render(string $template, array $data = []) : void
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        $twig = new Environment($loader);
        //Rendre une vue $template = 'taskpage.twig', $data['tasks' => $tasks]
        echo $twig->render($template, $data);
    }
}

?>