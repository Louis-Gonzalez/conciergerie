<?php

// On déclare de l'espace
namespace App\TpFinPhp\Controllers;

// On déclare la class nécessaire 

use App\TpFinPhp\Services\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\TpFinPhp\Services\Utils;
use App\TpFinPhp\Repository\TaskRepository;

/**
 * Class TaskController
 * gère la route de la page des tâches
 * @var array $tasks
 * @return $tasks
 * redirige vers la taskpage
 */
// On déclare la classe TaskController
class TaskController extends AbstractController
{
    /**
     * la fonction index affiche la page des tâches
     * @var array $tasks
     * @return $tasks
     * redirige vers la taskpage
     */
    // On délcare la fonction index par default
    public function index()
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction index
         * @var array $tasks
         * @return $tasks
         * redirige vers la taskpage
         */
        $taskRepository = new TaskRepository();
        $tasks = $taskRepository->index();
        // // Rendre une vue
        $this->render('taskpage.twig', ['tasks' => $tasks]);
    }
    
    /**
     * la fonction new affiche la page pour ajouter une tâche
     * @var string $text
     * @return $text
     * redirige vers la tasknewpage
     */
// On délcare la fonction new
    public function new()
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction new
         * @var string $text
         * @return $text
         * redirige vers la tasknewpage
         */
        $text = "C'est la page pour ajouter une tâche !";
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $taskRepository = new TaskRepository();
                $taskRepository->new();
                // Redirection vers le tableau des tâches
                header('Location: /formation_php/tp_fin_php/public/task');
            };
        // Rendre une vue
        $this->render('tasknewpage.twig',   [
                                                'text' => $text,
                                            ]);
    }
    /**
     * supprime une tâche
     * @param integer $id
     * @return void
     * ridirige vers la taskpage
     */
    public function delete(int $id)
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction delete
         * @param integer $id
         * @return void
         * ridirige vers la taskpage
         */
        $taskRepository = new TaskRepository();
        $taskRepository->delete($id);
        header('Location: /formation_php/tp_fin_php/public/task');
    }
    /**
     * mettre à jour une tâche
     * @param integer $id
     * @var array $task
     * @return $task
     * redirige vers la taskpage
     */
    public function update($id) 
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction update
         * @param integer $id
         * @var array $task
         * @return $task
         * redirige vers la taskpage
         */
        $loader = new FilesystemLoader("../templates"); 
        $twig = new Environment($loader);

        $taskRepository = new TaskRepository();
        $task = $taskRepository->update($id);
        
        $this->render('taskupdatepage.twig',   [
                                                    'task' => $task
                                                ]);
    }
    /**
     * la fonction show affiche une tâche
     * @param integer $id
     * @var array $task
     * @return void
     * redirige vers la taskshowpage
     */
    // On délcare la fonction show qui prend en parametre $id
    public function show(int $id)
    {   

        $taskRepository = new TaskRepository();
        $task = $taskRepository->show($id);

        ////////////// Méthode 1 ////////////////////////////////////////////////////////////////
        // $tasks = $pdo->selectAll("SELECT * FROM task ");

        // echo $twig->render('taskshowpage.twig', [   
        //                                             'tasks' => $tasks,
        //                                             'id' => $id,
        //                                             'title' => $tasks[$id-1]['title'],
        //                                             'description' => $tasks[$id-1]['description'],
        //                                             'duration' => $tasks[$id-1]['duration'],
        //                                             'status' => $tasks[$id-1]['status'],
        //                                             'create_at' => $tasks[$id-1]['create_at'],
        //                                             'update_at' => $tasks[$id-1]['update_at']
        //                                         ]);

        /////////// Méthode 2 //////////////////////////////////////////////////////////////////////
        
        $this->render('taskshowpage2.twig',[
                                                    'task' => $task
                                                ]);
    }
    /**
     * mettre à jour le statut d'une tâche
     * @param integer $id
     * @var array $task
     * @return $task
     * redirige vers la taskpage
     */
    public function updateStatus(int $id)
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction updateStatus
         * @param integer $id
         * @var array $task
         * @return $task
         * redirige vers la taskpage
         */
        $loader = new FilesystemLoader("../templates");
        $twig = new Environment($loader);

        $taskRepository = new TaskRepository();
        $task = $taskRepository->updateStatus($id);

        $this->render('taskpage.twig',  [
                                            'task' => $task
                                        ]);
    }
    /**
     * la fonction showPlan affiche les tâches planifiées
     * @var array $tasks
     * @return $tasks
     * redirige vers la taskplanpage
     */
    public function showPlan()
    {
        /**
         * On instancie la class TaskRepository
         * et on appelle sa fonction showPlan
         * @var array $tasks
         * @return $tasks
         * redirige vers la taskplanpage
         */
        $taskRepository = new TaskRepository();
        $tasks = $taskRepository->showPlan();

        $this->render('taskplanpage.twig',  [
                                                'tasks' => $tasks[0],
                                                'statusEnAttente' => $tasks[1],
                                                'statusEncours' => $tasks[2],
                                                'statusTermine' => $tasks[3]
                                            ]);
    }
}
