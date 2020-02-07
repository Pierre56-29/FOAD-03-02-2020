<?php

class PictureManager extends Modele
{
    public function add(Picture $picture)
    {
        
        if(empty($_SESSION['idUser'])) // upload anonyme
        {
            $req ='INSERT INTO picture(fileName, status, link, tags, idUser, urlAnonymous) VALUES(?, ?, ?, ?, ?, ?)';
            $this->executeReq($req,array($picture->getFilename(), "private" ,$picture->getLink(), $picture->getTags(),1, $picture->getUrlAnonymous())); 
        }
        else // upload connecté
        { 
            $req ='INSERT INTO picture(fileName, status, link, tags, idUser) VALUES(?, ?, ?, ?, ?)';
            $this->executeReq($req,array($picture->getFilename(), $picture->getStatus(),$picture->getLink(), $picture->getTags(),$_SESSION['idUser']));
        }
        return "Votre image a été ajouté avec succès";
    }

    public function getPicturesDashboard($id_user)
    {
        $req='SELECT * FROM picture WHERE idUser=?';
        $res = $this->executeReq($req,array($id_user));
        
        $pictures = [];

        while($donnes =$res->fetch(PDO::FETCH_ASSOC))
        {
            $picture = new Picture();
            $picture->hydrate($donnes);
            $pictures[] = $picture;
        }

        return $pictures;
    }

    public function getPublicPictures($limit = 0)
    {
        if($limit !== 0)
        {
            $req='SELECT * FROM picture WHERE status="public" ORDER BY dateUpload DESC LIMIT '. $limit;
        }
        else 
        {
            $req='SELECT * FROM picture WHERE status="public" ORDER BY dateUpload DESC';
        }
        $res = $this->executeReq($req);
        
        $pictures = [];

        while($donnes =$res->fetch(PDO::FETCH_ASSOC))
        {
            $picture = new Picture();
            $picture->hydrate($donnes);
            $pictures[] = $picture;
        }

        return $pictures;
    }


    public function delete($idPicture)
    {
        $req='DELETE from picture WHERE idPicture = ?';
        $res = $this->executeReq($req,array($idPicture));

        return true;
    }

    public function changeStatusPicture($idPicture, $status)
    {
        $req="UPDATE picture SET status=? WHERE idPicture = ?";
        $res = $this->executeReq($req,array($status,$idPicture));

        return true;
    }

    public function getCountPublicPictures()
    {
        $req = "SELECT COUNT(idPicture) as pictureCount FROM picture WHERE status='public'";
        $res = $this->executeReq($req);
        $res = $res->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getPublicPicture($idPicture)
    {
        $req = "SELECT * from picture WHERE status='public' AND idPicture=?";
        $res = $this->executeReq($req,array($idPicture));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res !== false)
        {
            $picture = new Picture();
            $picture->hydrate($res);
            return $picture;
        }
        else {
            return false;
        }
    }

    public function getPicture($idPicture)
    {
        $req = "SELECT * from picture WHERE idPicture=?";
        $res = $this->executeReq($req,array($idPicture));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res !== false)
        {
            $picture = new Picture();
            $picture->hydrate($res);
            return $picture;
        }
        else {
            return false;
        }
    }

    public function getAnonymousPicture($urlAnonymous)
    {
        $req ="SELECT * FROM picture WHERE status = 'private' AND urlAnonymous= ?";
        $res = $this->executeReq($req,array($urlAnonymous));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res !== false)
        {
            $picture = new Picture();
            $picture->hydrate($res);
            return $picture;
        }
        else {
            return false;
        }

    }

    public function getPrivatePicture($idPicture)
    {
        $req = "SELECT * from picture WHERE status='private' AND idPicture=?";
        $res = $this->executeReq($req,array($idPicture));
        $res = $res->fetch(PDO::FETCH_ASSOC);
        if($res !== false)
        {
            $picture = new Picture();
            $picture->hydrate($res);
            return $picture;
        }
        else {
            return false;
        }
    }

    public function searchPicture($search)
    {
        $req = "SELECT * FROM picture WHERE status='public' AND (";
        
        forEach($search as $mot)
        {
            $req.=" fileName LIKE '%$mot%' OR tags LIKE '%$mot%' OR ";
        }
        $req = substr($req, 0, -3);
        $req.=")";  // ne pas oublier parenthèses, sinon bloquera en image publique pour le titre mais pas pour les tags où il ira prendre privé et public
      
        $res = $this->executeReq($req);
       
        $pictures = [];

        while($donnes =$res->fetch(PDO::FETCH_ASSOC))
        {

            $picture = new Picture();
            $picture->hydrate($donnes);
            $pictures[] = $picture;
        }

        return $pictures;
       
    }

}