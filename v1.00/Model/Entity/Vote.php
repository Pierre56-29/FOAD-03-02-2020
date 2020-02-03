<?php

class Vote extends Modele {

private $idUser;
private $idVote;
private $idPicture;
private $score;


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
 * Get the value of idVote
 */ 
public function getIdVote()
{
return $this->idVote;
}

/**
 * Set the value of idVote
 *
 * @return  self
 */ 
public function setIdVote($idVote)
{
$this->idVote = $idVote;

return $this;
}

/**
 * Get the value of idPicture
 */ 
public function getIdPicture()
{
return $this->idPicture;
}

/**
 * Set the value of idPicture
 *
 * @return  self
 */ 
public function setIdPicture($idPicture)
{
$this->idPicture = $idPicture;

return $this;
}

/**
 * Get the value of score
 */ 
public function getScore()
{
return $this->score;
}

/**
 * Set the value of score
 *
 * @return  self
 */ 
public function setScore($score)
{
$this->score = $score;

return $this;
}
}