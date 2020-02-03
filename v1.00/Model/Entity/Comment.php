<?php

class Comment extends Modele {

private $idComment;
private $title;
private $content;
private $datePublication;
private $idPicture;
private $idUser;







/**
 * Get the value of idComment
 */ 
public function getIdComment()
{
return $this->idComment;
}

/**
 * Set the value of idComment
 *
 * @return  self
 */ 
public function setIdComment($idComment)
{
$this->idComment = $idComment;

return $this;
}

/**
 * Get the value of title
 */ 
public function getTitle()
{
return $this->title;
}

/**
 * Set the value of title
 *
 * @return  self
 */ 
public function setTitle($title)
{
$this->title = $title;

return $this;
}

/**
 * Get the value of content
 */ 
public function getContent()
{
return $this->content;
}

/**
 * Set the value of content
 *
 * @return  self
 */ 
public function setContent($content)
{
$this->content = $content;

return $this;
}

/**
 * Get the value of datePublication
 */ 
public function getDatePublication()
{
return $this->datePublication;
}

/**
 * Set the value of datePublication
 *
 * @return  self
 */ 
public function setDatePublication($datePublication)
{
$this->datePublication = $datePublication;

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
}