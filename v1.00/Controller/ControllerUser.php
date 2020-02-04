<?php

class ControllerUser
{
    public function afficherPageInscription()
    {
        $vue = new View("Inscription");
        $vue->generer();
    }
    
    public function afficherPageConnexion()
    {
        $vue = new View("Connexion");
        $vue->generer();
    }


    public function inscription($login, $email, $password)
    {
        $array = array("login" => $login, "email" => $email, "password" => $password);
        $user = new User();
        $user->hydrate($array);
        $userManager = new UserManager();
        $userManager->add($user);
        
        header('Location: ../View/Accueil.php'); 
        exit();       
    }

    public function connexion($login,$password)
    {
        $array = array("login" => $login, "password" => $password);
        $user = new User();
        $user->hydrate($array);
        $userManager = new UserManager();
        $userManager->connect($user);
        
        header('Location: ../View/Accueil.php'); 
        exit();       
    }
}