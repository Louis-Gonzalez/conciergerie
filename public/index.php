<?php 

session_start();

// On appelle l'autoloader
require_once('../vendor/autoload.php'); // attention le index.php n'est plus à la racine il est dans le dossier public

// On appelle la class nécessaire au routage
use App\TpFinPhp\Router;


// On instancie la classe router et appelle sa méthode
$router = new Router();
$router->index();

?>
