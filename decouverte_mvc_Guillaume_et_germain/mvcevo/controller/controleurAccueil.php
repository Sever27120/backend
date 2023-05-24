<?php

require_once 'model/Billet.php';
require_once 'vue/vue.php';

class controleurAccueil
{
    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    // Affiche la liste de tous les billets du blog
    public function accueil()
    {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }
}
