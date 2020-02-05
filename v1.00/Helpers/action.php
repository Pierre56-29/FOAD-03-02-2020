<?php

class Action extends Modele
{
    public function like($data,$idUser,$idPicture){

        $req = "INSERT INTO vote(score,idUser,idPicture) VALUES (?,?,?)";
        $this->executeReq($req,array($data,$idUser,$idPicture));
    }


}




?>
