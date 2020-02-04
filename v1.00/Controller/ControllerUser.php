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
            $vue = new View("Inscription");
            $vue->generer(array("messageErreur" => "identifiant ou mot de passe Invalide"));
            

        }else{

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "L'adresse email '$email' n'est pas valide.";
                $this-> afficherPageInscription($error);
                
            }else{

                $password = password_hash(trim($password),PASSWORD_DEFAULT);
                $array = array("login" => $login, "email" => $email, "password" => $password);
                
                $user = new User();
                $user->hydrate($array);

                $userManager = new UserManager();
                $userManager->add($user);
                
                header('Location: index.php?action=Connexion'); 
                exit();  
            }     
        }
    }

    public function connexion($login,$password)
    {
        $login =trim(htmlspecialchars($login));
        //$password = password_hash(trim($password),PASSWORD_DEFAULT);
        $array = array("login" => $login, "password" => $password);

        $userManager = new UserManager();
        $user = $userManager->connect($login);

        if ($user !== false && $user['password'] === $password)
        {
            $_SESSION['login'] = $login;
            $_SESSION['idUser'] = $user['idUser'];
            Header('Location: index.php');
        }
        else {
            $vue = new View("Connexion");
            $vue->generer(array("messageErreur" => "identifiant ou mot de passe Invalide"));
        }
        
        $_SESSION['login']=$login;
        $_SESSION['idUser']=$user->getIdUser();
        header('Location: index.php');
        exit();       
    }
}