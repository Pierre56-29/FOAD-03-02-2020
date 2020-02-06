<?php

class ControllerVote
{
    public function likePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->likePicture($idPicture,$idVoter);
        
    }
}


?>