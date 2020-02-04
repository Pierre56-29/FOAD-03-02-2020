<?php

class UserManager extends Modele
{
    public function add(User $user)
    {

        $req ='INSERT INTO user(login, password, email) VALUES(?, ?, ?)';
        $this->executeReq($req,array($user->getLogin(), $user->getPassword(),$user->getEmail()));
        $_SESSION['login'] = $user->getLogin();
        return "Votre user a été ajouté avec succès";
    }

    public function getUser($id)
    {
        $req='SELECT login, password, email FROM user WHERE idUser=?';
        $res = $this->executeReq($req,array($id));
        $res2 = $res->fetch(PDO::FETCH_ASSOC);
        if($res2 != FALSE)
        {
            $user = new User();
            $user->hydrate($res2);
            return $user;
        }
        else
        {
            return false;
        }
    }
    
    public function verifUser($login)
    {
        $req='SELECT login, password, email FROM user WHERE login=?';
        $res = $this->executeReq($req,array($login));
        $table = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($table))
        {
            return true;
        } else{
            return false;
        }

    }

    public function getUsers()
    {
        $req = 'SELECT * FROM user';
        $res = $this->executeReq($req);

        $users = [];

        while($donnees = $res->fetch(PDO::FETCH_ASSOC))
        {
            $user = new User();
            $user->hydrate($donnees);
            $users[] = $user;
        }
        return $users;
    }

    public function connect($user)
    {
        $req='SELECT login, password, email, idUser FROM user WHERE login=?';
        $res = $this->executeReq($req,array($user->getLogin()));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res != FALSE)
        { 
            if ($res['password']=$user->getPassword()){
                $_SESSION['login'] = $res['login'];
                return $_SESSION['login'];
            }           
        }else{
            return "Cet utilisateur n'existe pas";
        }
    }
}