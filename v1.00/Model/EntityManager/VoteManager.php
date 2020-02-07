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
    public function getAllVotes($idpicture)
    {
        $reqallvotes = 'SELECT score FROM vote';
        $reqallvotes=$this->executeReq($reqallvotes,array($idpicture,$idpicture));
        $reqallvotes=$reqallvotes->fetch(PDO::FETCH_ASSOC);
        var_dump($reqallvotes);
        die();
        return $reqallvotes;   
    }
    
    public function likePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        $iduser=intval($iduser);
        
        $req1 = 'SELECT score, idUser, idPicture FROM vote WHERE idPicture=? AND idUser=?';
        $req1 = $this->executeReq($req1,array($idpicture, $iduser ));    
        $result=$req1->fetch(PDO::FETCH_ASSOC);
                
        if (is_array($result))
        {
            $req = 'UPDATE vote SET score=1 WHERE idUser=? AND idPicture=?';
            $req = $this->executeReq($req,array($iduser, $idpicture )); 
                
        }else{ 
            $req = 'INSERT INTO vote(score,idUser,idPicture) VALUES (1,?,?)';
            $req = $this->executeReq($req,array($iduser, $idpicture ));
        }
      
        echo json_encode(array('like'=>$this->getVoteLike($idpicture),'dislike'=>$this->getVoteDislike($idpicture)));
    }

    public function unlikePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        $iduser=intval($iduser);
       
        $req = 'UPDATE vote SET score=0 WHERE idUser=? AND idPicture=?';
        $req = $this->executeReq($req,array($iduser, $idpicture)); 
    
        echo json_encode(array('like'=>$this->getVoteLike($idpicture),'dislike'=>$this->getVoteDislike($idpicture)));
    }




    public function dislikePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        $iduser=intval($iduser);
        
        $req1 = 'SELECT score, idUser, idPicture FROM vote WHERE idPicture=? AND idUser=?';
        $req1 = $this->executeReq($req1,array($idpicture, $iduser ));    
        $result=$req1->fetch(PDO::FETCH_ASSOC);
        
        if (is_array($result))
        {
            $req = 'UPDATE vote SET score=-1 WHERE idUser=? AND idPicture=?';
            $req = $this->executeReq($req,array($iduser, $idpicture ));     
        }else{ 
           $req = 'INSERT INTO vote(score,idUser,idPicture) VALUES (-1,?,?)';
            $req = $this->executeReq($req,array($iduser, $idpicture ));
        }
        echo json_encode(array('like'=>$this->getVoteLike($idpicture),'dislike'=>$this->getVoteDislike($idpicture)));
    }

    public function undislikePicture($idpicture, $iduser)
    {
        $idpicture=intval($idpicture);
        $iduser=intval($iduser);

        $req = 'UPDATE vote SET score=0 WHERE idUser=? AND idPicture=?';
        $req = $this->executeReq($req,array($iduser, $idpicture)); 
        echo json_encode(array('like'=>$this->getVoteLike($idpicture),'dislike'=>$this->getVoteDislike($idpicture)));   
    }
}