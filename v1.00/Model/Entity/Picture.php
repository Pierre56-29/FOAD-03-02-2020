<?php

class Picture extends Modele {

    private $idPicture;
    private $filename;
    private $status;
    private $link;
    private $tags;
    private $dateUpload;
    private $idUser;



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
     * Get the value of filename
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $filename=trim(htmlspecialchars($filename));
        $this->filename = $filename;

        return "true";
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        if($status ==="private" || $status ==="public")
        {
            $this->status = $status;
            return true;
        }
        else
        {
            return "L'image ne peut être que public ou privée !";
        }
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;

        return true;
    }

    /**
     * Get the value of tags
     */ 
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */ 
    public function setTags($tags)
    {
        $tags==trim(htmlspecialchars($tags));
        $this->tags = $tags;

        return true;
    }

    /**
     * Get the value of dateUpload
     */ 
    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    /**
     * Set the value of dateUpload
     *
     * @return  self
     */ 
    public function setDateUpload($dateUpload)
    {
        $this->dateUpload = $dateUpload;

        return $true;
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
        if (is_int($idUser))
        {
            $this->idUser = $idUser;
            return $true;
        }
        else {
            return "Problème de compte utilisateur, veuillez recommencer";
        }
      
    }
}