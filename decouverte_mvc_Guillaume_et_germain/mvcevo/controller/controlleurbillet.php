<?php

require_once 'model/Billet.php';

require_once 'model/commentaire.php';

require_once 'vue/vue.php';

class controlleurBillet
{

    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet)
    {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getComments($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    //ajoute un commentaire à un billet

    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
        }
}

// /La méthode generer() de 
// la classe Vue définie plus haut est utilisée en lui passant en paramètre un tableau 
// // associatif contenant l'ensemble des données nécessaires à la génération de la vue.