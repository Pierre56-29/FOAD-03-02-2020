<?php

class PictureManager extends Modele
{
    public function add(Picture $picture)
    {
        $req ='INSERT INTO picture(fileName, status, link, tags, idUser) VALUES(?, ?, ?, ?, ?)';
        if(empty($_SESSION['idUser']))
        {
            $this->executeReq($req,array($picture->getFilename(), $picture->getStatus(),$picture->getLink(), $picture->getTags(),1)); 
        }
        else {
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
        $req='DELETE * from pictures WHERE idPicture = ?';
        $res = $this->executeReq($req,$idPicture);

        return "Supprimé avec succès";
    }

    public function changeStatus($idPicture)
    {
        $req="UPDATE picture SET status=?";
        $res = $this->executeReq($req,$idPicture);

        return " Modifié avec succès";
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

}