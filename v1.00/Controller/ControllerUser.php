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
        $login = htmlentities($login);
        $userManager = new UserManager();
        $userManager = $userManager->verifUser($login);

        if ($userManager)
        {
            $this-> afficherPageInscription();
            echo "Cet identifiant est déja utilisé";

        }else{

            $this-> afficherPageInscription();

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "L'adresse email '$email' n'est pas valide.";
            }else{

                $password = password_hash(trim($password),PASSWORD_DEFAULT);
                $array = array("login" => $login, "email" => $email, "password" => $password);
                
                $user = new User();
                $user->hydrate($array);

                $userManager = new UserManager();
                $userManager->add($user);
                
                header('Location: ../View/Accueil.html.php'); 
                exit();  
            }     
        }
    }

    public function connexion($login,$password)
    {
        $array = array("login" => $login, "password" => $password);
        $user = new User();
        $user->hydrate($array);
        $userManager = new UserManager();
        $userManager->connect($user);
        
        $_SESSION['login']=$login;
        $_SESSION['idUser']=$user->getIdUser();
        header('Location: ../View/Accueil.html.php');
        exit();       
    }
}