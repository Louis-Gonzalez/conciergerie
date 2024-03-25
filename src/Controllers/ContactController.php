<?php

// On déclare de l'espace
namespace App\TpFinPhp\Controllers;

// On appelle les class
// On déclare la class nécessaire 
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\TpFinPhp\Services\Database;
use App\TpFinPhp\Services\Utils;
use App\TpFinPhp\Controllers\AbstractController;
use App\TpFinPhp\Repository\ContactRepository;

/**
 * gère la route de la page de contact 
 */
class ContactController extends AbstractController
{
    /**
     * Affiche la page de contact
     * @return $messages dans la vue twig contactpage
     */
    public function index()
    {
        /**
         * SELECT * FROM contact
         * Se connecter à la base de données
         * @var string $messages
         * @return $messages dans la vue twig contactpage
         */
        // echo "C'est la page de contact !";
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        $messages = new ContactRepository();
        $messages = $messages->index();
        $this->render('contactpage.twig', [
                                                'messages' => $messages,
                                            ]);
    }

    /**
     * montre le message de contact sélectionné
     * @param integer $id
     * @return $message
     * redirige vers la vue twig contactshowpage
     */
    public function show(int $id)
    {
        /**
         * la correspondance de l'id souhaite via une requete sql
         * SELECT * FROM contact WHERE id = $id
         * Se connecter à la base de données
         * SELECT * FROM contact
         * @var int $id
         * @var string $message
         * @return $message dans la vue twig contactshowpage
         */
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);
        $message = new ContactRepository();
        $message = $message->showMessage($id);

        // Rendre une vue
        $this->render('contactshowpage.twig',  [
                                                        'message'=>$message
                                                    ]);
    }
    /**
     * supprime un message de contact sélectionné
     *
     * @param integer $id
     * @return void
     * redirige vers la vue twig contactpage
     */
    public function deleteMessage(int $id)
    {
        /**
         * la correspondance de l'id souhaite via une requete sql
         * DELETE FROM contact WHERE id = $id
         * Se connecter à la base de données
         * DELETE FROM contact
         * @var int $id
         * @return $message dans la vue twig contactdeletepage
         */
        $loader = new FilesystemLoader("../templates");
        $twig = new Environment($loader);
        $message = new ContactRepository();
        $message = $message->deleteMessage($id);
        header ('Location: /formation_php/tp_fin_php/public/contact');
    }
    /**
     * Créer un nouveau message de contact
     * @return void
     * redirige vers la vue twig contactpage
     */
    // On délcare la fonction index
    public function new()
    {
        /**
         * SELECT * FROM contact
         * Se connecter à la base de données
         * @return $message dans la vue twig contactnewpage
         */

        // Déterminer le dossier qui va contenir les vues
        // __DIR__ = le dossier parant dans lequel on est  et dirname(__DIR__) = renvoie directement à la racine
        $loader = new FilesystemLoader("../templates"); 
        // Initialiser twig 
        $twig = new Environment($loader);

        $message = new ContactRepository();
        $message = $message->new();

        //Rendre une vue
        $this->render('contactnewpage.twig', []);
    }

    /**
     * Met à jour un message envoyer par contact
     *
     * @param integer $id
     * @return $message dans la vue twig contactupdatepage
     * redirige vers la vue twig contactpage
     */
    public function updateMessage(int $id){
        /**
         * la correspondance de l'id souhaite via une requete sql
         * SELECT * FROM contact WHERE id = $id
         * Se connecter à la base de données
         * SELECT * FROM contact
         * @return $message dans la vue twig contactupdatepage
         */
        $loader = new FilesystemLoader("../templates");
        $twig = new Environment($loader);
        $message = new ContactRepository();
        $message = $message->updateMessage($id);

        header ('Location: /formation_php/tp_fin_php/public/contact');
        // Rendre une vue
        $this->render('contactupdatepage.twig', [
                                                    'message' => $message
                                                ]);
    }
}

?>