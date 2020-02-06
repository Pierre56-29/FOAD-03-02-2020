<?php

class ControllerVote
{
    public function likePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager->likePicture($idPicture,$idVoter);
    }
}


?>