<?php

class UserManager extends Modele
{
    public function add(User $user)
    {
        $req ='INSERT INTO user(login, password, email) VALUES(?, ?, ?)';
        $this->executeReq($req,array($user->getLogin(), $user->getPassword(),$user->getEmail()));
        return "Votre user a été ajouté avec succès";
    }

    public function getUser($login)
    {
        $req='SELECT login, password, email FROM user WHERE login=?';
        $res = $this->executeReq($req,$login);
        $res->fetch(PDO::FETCH_ASSOC);
        if($res != FALSE)
        {
            $user = new User();
            $user->hydrate($res);
            return $user;
        }
        else 
        {
            return "Ce user n'existe pas !";
        }
    }

    public function getUsers()
    {
        $req = 'SELECT * FROM user';
        $res = $this->executeReq($req);

        $users = [];

        while($donnes = $res->fetch(PDO::FETCH_ASSOC))
        {
            $user = new User();
            $user->hydrate($donnes);
            $users[] = $user;
        }
        return $users;
    }

    public function connect($user)
    {
        $req='SELECT login, password, email FROM user WHERE login=?';
        $res = $this->executeReq($req,array($user->getLogin()));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res != FALSE)
        { 
            
            print_r($res);           

        }else{
            echo "Cet utilisateur n'existe pas";
        }
    }
}