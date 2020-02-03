<?php

class UserManager extends Modele
{
    public function add(User $user)
    {
        $req ='INSERT INTO user(login, password, email) VALUES(?, ?, ?)';
        $this->executeReq($req,array($user->getLogin(), $user->getPassword(),$user->getEmail()));
    }

    public function getUser($login)
    {
        $req='SELECT login, password, email FROM user WHERE login=?';
        $res = $this->executeReq($req,$login);
        $res->fetch(PDO::ASSOC);
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

        while($donnes = $res->fetch(PDO::ASSOC))
        {
            $user = new User();
            $user->hydrate($donnes);
            $users[] = $user;
        }

        return $users;
    }
}