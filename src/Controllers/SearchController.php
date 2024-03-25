<?php

// On déclare de l'espace
namespace App\TpFinPhp\Controllers;

// On appelle les class
// On déclare la class nécessaire 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\TpFinPhp\Repository\SearchRepository;
use App\TpFinPhp\Controllers\AbstractController;


/**
 * Class SearchController
 * affiche la page de recherche
 * @var string $keyword
 * @var array $tasks
 * @return $keyword et $tasks
 */
// On déclare le nom de la class
class SearchController extends AbstractController
{
    /**
     * 
     * recherche une task
     * la fonction index affiche la page de recherche
     * @var string $keyword
     * @var array $tasks
     * @return $keyword et $tasks
     * redirige vers la searchpage
     */
    // On délcare la fonction index
    public function index()
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        $keyword = $_POST['keyword'];
        $tasks = new SearchRepository(); 
        $tasks = $tasks->search();
        // Rendre une vue
        $this->render('searchpage.twig', [
                                                'keyword' => $keyword,
                                                'tasks' => $tasks
                                            ]);
    }
    public function filterTask()
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        // var_dump($_POST); //  en cours, en attente, terminé
        $keyword = $_POST['status']; // je trouve la correspondance avec la valeur du drop down
        $tasks = new SearchRepository();
        $tasks = $tasks->filterStatus($keyword);
        // Rendre une vue
        $this->render('searchpage.twig', [
                                                'keyword' => $keyword,
                                                'tasks' => $tasks
                                            ]);
    }
    public function filterWho()
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        // var_dump($_POST); //  en cours, en attente, terminé
        $keyword = $_POST['who']; // je trouve la correspondance avec la valeur du drop down
        $tasks = new SearchRepository();
        $tasks = $tasks->filterWho($keyword);
        // Rendre une vue
        $this->render('searchpage.twig', [
                                                'keyword' => $keyword,
                                                'tasks' => $tasks
                                            ]);
    }
    public function filterChallet()
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        // var_dump($_POST['challet']); //  en cours, en attente, terminé
        // die();
        $keyword = $_POST['challet']; // je trouve la correspondance avec la valeur du drop down
        $tasks = new SearchRepository();
        $tasks = $tasks->filterChallet($keyword);
        // Rendre une vue
        $this->render('searchpage.twig', [
                                                'keyword' => $keyword,
                                                'tasks' => $tasks
                                            ]);
    }
    public function filterDate()
    {
        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        

        // var_dump($_POST['dateStart']);
        // var_dump($_POST['dateEnd']); //  date de debut et date de fin
        // die();
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
         // je trouve la correspondance avec les valeurs du modal
        $tasks = new SearchRepository();
        $tasks = $tasks->filterDate($dateStart, $dateEnd);
        // Rendre une vue
        $this->render('searchpage.twig', [
                                                'dateStart' => $dateStart,
                                                'dateEnd' => $dateEnd,
                                                'tasks' => $tasks
                                            ]);
    }

    /**
     * recherche une message de contact
     * la fonction searchContact 
     * @var string $keyword
     * @var array $messages
     * @return $messages et $keyword
     * redirige vers la searchcontactpage
     */
    public function searchContact(){
        /**
         * recherche un message de contact par $keyword
         * la fonction searchContact
         * @var string $keyword
         * @var array $messages
         * @return $messages et $keyword
         * redirige vers la searchcontactpage
         */
        $loader = new FilesystemLoader("../templates");
        $twig = new Environment($loader);
        $keyword = $_POST['keyword'];
        $messages = new SearchRepository();
        $messages = $messages->searchContact();
        
        $this->render('searchcontactpage.twig', [
                                                'keyword' => $keyword,
                                                'messages' => $messages
                                            ]);
    }
}

?>