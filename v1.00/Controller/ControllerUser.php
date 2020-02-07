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

    public function inscription($login, $email, $password, $passwordconfirm)
    {
        $login = htmlentities(trim($login));
        $email = trim($email);
        $userManager = new UserManager();
        $userManager = $userManager->verifUser($login);

        $userManager2 = new UserManager();
        $userManager2 = $userManager2->verifUserMail($email);

        if ($userManager OR $userManager2)
        {
            $vue = new View("Inscription");
            $vue->generer(array("messageErreur" => "L'identifiant ou l'adresse mail existe déja"));

        }else{

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $vue = new View("Inscription");
                $vue->generer(array("messageErreur" => "L'adresse mail n'est pas valide"));    
                
            }else{

                $password = password_hash(trim($password),PASSWORD_DEFAULT);
                $passwordconfirm = trim($passwordconfirm);

                if (!password_verify($passwordconfirm,$password)){
                    $vue = new View("Inscription");
                    $vue->generer(array("messageErreur" => "Les mots de passe ne correspondent pas")); 
                }else{
                
                    if (!(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#',$passwordconfirm) AND strlen($passwordconfirm)>7)){
                        $vue = new View("Inscription");
                        $vue->generer(array("messageErreur" => "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule,
                        un chiffre et un caractère spécial")); 
                    }else{

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
        }
    }

    public function connexion($login,$password)
    {
        $login =trim(htmlspecialchars($login));
        $password = trim(htmlspecialchars($password));
        $array = array("login" => $login, "password" => $password);

        $userManager = new UserManager();
        $user = $userManager->connect($login);
        var_dump( $user['password'], $password);
        if ($user !== false && password_verify($password, $user['password']) === true)
        {
            $_SESSION['login'] = $login;
            $_SESSION['idUser'] = $user['idUser'];
            Header('Location: index.php');
        }
        else {
            $vue = new View("Connexion");
            $vue->generer(array("messageErreur" => "identifiant ou mot de passe Invalide"));
        }  
    }

    public function seDeconnecter()
    {
        session_destroy();
        Header('Location: index.php');
    }
}