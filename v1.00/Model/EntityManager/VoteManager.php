<?php

class VoteManager extends Modele
{
    public function getVote($idpicture)
    {
        $moyenne = 0;

        $req = 'SELECT score FROM vote WHERE idPicture =?';
        $res = $this->executeReq($req,array($idpicture));
        $scores=$res->fetch(PDO::FETCH_ASSOC);
        if ($scores == FALSE){
            return array(0,0);
        }else{

            foreach ($scores as $score){
                $moyenne = $moyenne + $score;
            }
            var_dump($moyenne);
            return $moyenne;
        }
    }

    
    
    public function like(Picture $picture)
    {
        $req = '';
    }

    public function unlike()
    {

    }
}