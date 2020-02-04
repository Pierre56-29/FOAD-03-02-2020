<?php

class ControllerUser
{
        
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
        
        // header('Location: ../View/Accueil.php'); 
        // exit();       
    }
}