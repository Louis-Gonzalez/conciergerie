<?php 

// On déclare de l'espace
namespace App\TpFinPhp\Repository;

// On appelle les class nécessaire 
use App\TpFinPhp\Services\Database;

// On déclare la class : SearchRepository

class SearchRepository
{
    public function search()
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );

        $keyword = $_POST['keyword'];

        $sql = "SELECT * FROM task
        WHERE title LIKE '%$keyword%'
        OR description LIKE '%$keyword%'
        OR duration LIKE '%$keyword%'
        OR chalet LIKE '%$keyword%'";

        $tasks = $pdo->selectAll($sql , []);  
        
        return $tasks;
    }
    public function filterStatus($keyword)
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );
        $sql = "SELECT * FROM task
        WHERE status LIKE '%$keyword%' ";
        $tasks = $pdo->selectAll($sql , []);  
        return $tasks;
    }
    public function filterWho($keyword)
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );
        $sql = "SELECT * FROM task
        WHERE who LIKE '%$keyword%' ";
        $tasks = $pdo->selectAll($sql , []);  
        return $tasks;
    }
    public function filterChalet($keyword)
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );
        $sql = "SELECT * FROM task
        WHERE chalet LIKE '%$keyword%' ";
        $tasks = $pdo->selectAll($sql , []);  
        return $tasks;
    }
    public function filterDate($dateStart, $dateEnd)
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );
        // ici on recherche la date entre $dateStart et $dateEnd
        $sql = "SELECT * FROM task WHERE create_at BETWEEN '$dateStart' AND '$dateEnd'";
        $tasks = $pdo->selectAll($sql , []);  
        return $tasks;
    }

    public function searchContact()
    {
        // Se connecter à la base de données
        $pdo = new Database (
                                "127.0.0.1",
                                "chalet_php",
                                "3306",
                                "root",
                                ""
                            );
                // var_dump($_POST);
                $keyword = $_POST['keyword'];

                // var_dump("valeur de keyword : ", $keyword);
                $sql = "SELECT * FROM contact
                        WHERE title LIKE '%$keyword%'
                        OR description LIKE '%$keyword%'
                        OR chalet LIKE '%$keyword%'";
                
                $messages = $pdo->selectAll($sql , []);
        return $messages;
    }
}