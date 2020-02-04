<?php

class User extends Modele {

private $idUser;
private $login;
private $password;
private $email;



/**
 * Get the value of idUser
 */ 
public function getIdUser()
{
return $this->idUser;
}

/**
 * Set the value of idUser
 *
 * @return  self
 */ 
public function setIdUser($idUser)
{
$this->idUser = $idUser;

return $this;
}

/**
 * Get the value of login
 */ 
public function getLogin()
{
return $this->login;
}

/**
 * Set the value of login
 *
 * @return  self
 */ 
public function setLogin($login)
{
        $this->login = $login;
        return true;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of mail
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of mail
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}


public function hydrate(array $donnees){

    foreach ($donnees as $key => $value ){
        $method = 'set'.ucfirst($key);

        if(method_exists($this,$method)){
            $this->$method($value);
        }
    }
}


}

