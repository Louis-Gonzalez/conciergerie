<?php

// On déclare de l'espace
namespace App\TpFinPhp\Repository;

// On appelle les class
use App\TpFinPhp\Services\Database;
use App\TpFinPhp\Services\Utils;

// On déclare la class : ContactRepository

class ContactRepository
{
    public function index()
    {
        // Se connecter à la base de données
        $pdo = new Database (
            "127.0.0.1",
            "challet_php",
            "3306",
            "root",
            ""
        );
        $messages = $pdo->selectAll("SELECT * FROM contact");
        return $messages;
    }
    public function showMessage($id)
    {
        $pdo = new Database(
            "127.0.0.1",
            "challet_php",
            "3306",
            "root",
            ""
        );
        $message = $pdo->select("SELECT * FROM contact where id = ". $id );
        return $message;
    }
    public function deleteMessage($id)
    {
        $pdo = new Database(
            "127.0.0.1",
            "challet_php",
            "3306",
            "root",
            ""
        );
        $message = $pdo->select("DELETE FROM contact WHERE id = " .$id);
    }
    public function new()
    {  
            // Se connecter à la base de données
            $pdo = new Database(
                            "127.0.0.1",
                            "challet_php",
                            "3306",
                            "root",
                            ""
                        );
                        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Vérification des champs qui ont update dans le formulaire
            if(isset($_POST['title-message']) && isset($_POST['challet']) && isset($_POST['description-message']) && isset($_POST['email-message'])
            && !empty($_POST['title-message']) && !empty($_POST['challet']) && !empty($_POST['description-message']) && !empty($_POST['email-message'])) 
                {
                    $title= Utils::cleaner($_POST['title-message']);
                    $challet = Utils::cleaner($_POST['challet']);
                    $description = Utils::cleaner($_POST['description-message']);
                    $email = Utils::cleaner($_POST['email-message']);
                    $create_at = date('Y-m-d H:i:s');
                    $update_at = date('Y-m-d H:i:s');
                    // Insertion des champs dans la base de données
                    $message = $pdo->query("    INSERT INTO contact 
                                                (title, challet, description, email, create_at, update_at) 
                                                VALUES ( ?, ?, ?, ?, ?, ?)",[$title, $challet, $description, $email, $create_at, $update_at]);
                    // Redirection vers le tableau des tâches
                    header('Location: /formation_php/tp_fin_php/public/contact');
                }
        }
    }
    public function updateMessage(int $id)
    {
        $pdo = new Database(
            "127.0.0.1",
            "challet_php",
            "3306",
            "root",
            ""
        );
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Vérification des champs qui ont update dans le formulaire
            if(isset($_POST['title-message']) && isset($_POST['challet']) && isset($_POST['description-message']) && isset($_POST['email-message'])
            && !empty($_POST['title-message']) && !empty($_POST['challet'])&& !empty($_POST['description-message']) && !empty($_POST['email-message']))
                {
                    $title= Utils::cleaner($_POST['title-message']);
                    $challet = Utils::cleaner($_POST['challet']);
                    $description = Utils::cleaner($_POST['description-message']);
                    $email = Utils::cleaner($_POST['email-message']);
                    $update_at = date('Y-m-d H:i:s');
                    // Insertion des champs dans la base de données
                    $message = $pdo->query("    UPDATE contact 
                                                SET title = ?, 
                                                challet = ?,
                                                description = ?, 
                                                email = ?, 
                                                update_at = ?
                                                WHERE id = ?",[$title, $challet, $description, $email, $update_at, $id]);
                    // Redirection vers le tableau des tâches
                    header('Location: /formation_php/tp_fin_php/public/contact');
                }
        }
        return $message;
    }
}


?>