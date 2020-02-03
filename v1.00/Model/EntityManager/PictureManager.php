<?php

class PictureManager extends Modele
{
    public function add(Picture $picture)
    {
        $req ='INSERT INTO picture(file_name, status, link, tags, id_user) VALUES(?, ?, ?, ?, ?)';
        $this->executeReq($req,array($picture->getFilename(), $picture->getStatus(),$picture->getLink(), $picture->getTags(),$_SESSION['id_user']));
        return "Votre image a été ajouté avec succès";
    }

    public function getPicturesDashboard($id_user)
    {
        $req='SELECT * FROM picture WHERE id_user=?';
        $res = $this->executeReq($req,$id_user);
        
        $pictures = [];

        while($donnes =$res->fetch(PDO::ASSOC))
        {
            $picture = new Picture();
            $picture->hydrate($donnes);
            $pictures[] = $picture;
        }

        return $pictures;
    }

    public function getPublicPictures()
    {
        $req='SELECT * FROM picture WHERE status="public" ORDER BY date_upload DESC';
        $res = $this->executeReq($req);
        
        $pictures = [];

        while($donnes =$res->fetch(PDO::ASSOC))
        {
            $picture = new Picture();
            $picture->hydrate($donnes);
            $pictures[] = $picture;
        }

        return $pictures;
    }

    public function delete($idPicture)
    {
        $req='DELETE * from pictures WHERE id_picture = ?';
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