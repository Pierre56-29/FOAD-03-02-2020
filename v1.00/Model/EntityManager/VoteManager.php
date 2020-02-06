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
        $iduser=intval($iduser);
        
        // $req1 = 'SELECT score, idUser, idPicture FROM vote WHERE idPicture=? AND idUser=?';


        $req = 'INSERT INTO vote(score,idUser,idPicture) VALUES (1,?,?)';
       
        $req = $this->executeReq($req,array($iduser, $idpicture ));    
    }

    public function dislikePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        $iduser=intval($iduser);

        $req = 'DELETE FROM vote(score,idUser,idPicture) VALUES (1,'.$iduser.', '.$iduser.')';
       
        $req = $this->executeReq($req); 
        
    }
}