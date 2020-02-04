<?php

class PictureManager extends Modele
{
    public function add(Picture $picture)
    {
        //$_SESSION['id_user'] = 1;
        $req ='INSERT INTO picture(fileName, status, link, tags, idUser) VALUES(?, ?, ?, ?, ?)';
        if(empty($_SESSION['id_user']))
        {
            $this->executeReq($req,array($picture->getFilename(), $picture->getStatus(),$picture->getLink(), $picture->getTags(),1)); 
        }
        else {
            $this->executeReq($req,array($picture->getFilename(), $picture->getStatus(),$picture->getLink(), $picture->getTags(),$_SESSION['id_user']));
        }
        return "Votre image a été ajouté avec succès";
    }

    public function getPicturesDashboard($id_user)
    {
        $req='SELECT * FROM picture WHERE idUser=?';
        $res = $this->executeReq($req,$id_user);
        
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
}