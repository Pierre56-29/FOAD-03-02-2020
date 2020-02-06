<?php

class VoteManager extends Modele
{
    public function getVoteDislike($idpicture)
    {
        $reqdislike = 'SELECT COUNT(score)  FROM vote WHERE idPicture =? AND score=-1';
        $resdislike = $this->executeReq($reqdislike,array($idpicture));
        $nbdislike=$resdislike->fetch(PDO::FETCH_ASSOC);
          
        
            return $nbdislike["COUNT(score)"];
    }
    public function getVoteLike($idpicture)
    {
        $reqlike = 'SELECT COUNT(score) FROM vote WHERE idPicture =? AND score=1';
        $reslike = $this->executeReq($reqlike,array($idpicture));
        $nblike=$reslike->fetch(PDO::FETCH_ASSOC);  
        return $nblike["COUNT(score)"];
    }  
    
    public function likePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        
        $req = 'INSERT INTO vote(score,idUser,idPicture) VALUES (score=1,idUser=?, idPicture=?)';
        $req = $this->executeReq($req,array( $iduser, $idpicture,));
    }

    public function unlike()
    {

    }
}