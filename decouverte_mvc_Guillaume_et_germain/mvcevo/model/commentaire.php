<?php
require_once 'model/Model.php';
class commentaire extends Model
{

    public function getComments($idBillet)
    {
        $sql = 'SELECT COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur,
   COM_CONTENU as contenu FROM T_COMMENTAIRE WHERE BIL_ID = ?';
        return $this->executerRequete($sql, array($idBillet));
    }

    
    // méthode qui permet d'insérer un nouveau commentaire dans la BD 
    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU,
BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s"); // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }
}
