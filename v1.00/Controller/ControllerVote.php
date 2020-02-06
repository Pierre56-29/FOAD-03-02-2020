<?php

class ControllerVote
{
    public function likePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->likePicture($idPicture,$idVoter);
        
    }
    public function unlikePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->unlikePicture($idPicture,$idVoter);
        
    }
    public function dislikePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->dislikePicture($idPicture,$idVoter);
        
    }
    public function undislikePicture($idPicture,$idVoter){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->undislikePicture($idPicture,$idVoter);
        
    }
}


?>