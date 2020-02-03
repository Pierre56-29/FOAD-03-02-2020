<?php

class User extends Modele {

private $idUser;
private $login;
private $password;
private $mail;



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

return $this;
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
public function getMail()
{
return $this->mail;
}

/**
 * Set the value of mail
 *
 * @return  self
 */ 
public function setMail($mail)
{
$this->mail = $mail;

return $this;
}

}

