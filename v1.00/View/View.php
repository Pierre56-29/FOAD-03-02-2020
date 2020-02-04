<?php

class View
{
    private $fichier; // la vue à afficher

    public function __construct($action)
    {
        $this->fichier = "View/". $action .".html.php";
    }

    public function generer($data = [])
    {
        $contenu = $this->genererFichier($this->fichier, $data);
        $maPage =  array('content' => $contenu);
        $vue = $this->genererFichier('View/Template.html.php', $maPage);
        echo $vue;
    }

    private function genererFichier($fichier, $data)
    {
        if(file_exists($fichier))
        {
            extract($data);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else
        {
            throw new Exception ("Fichier $fichier introuvable");
        }
    }
}