<?php

class ControllerVote
{
    public function likePicture($idPicture){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->likePicture($idPicture,$_SESSION["idUser"]);
        
    }
    public function unlikePicture($idPicture){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->unlikePicture($idPicture,$_SESSION["idUser"]);
        
    }
    public function dislikePicture($idPicture){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->dislikePicture($idPicture,$_SESSION["idUser"]);
        
    }
    public function undislikePicture($idPicture){

        $voteManager = new VoteManager();
        $voteManager=$voteManager->undislikePicture($idPicture,$_SESSION["idUser"]);
        
    }
}


?>