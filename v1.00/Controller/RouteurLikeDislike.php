<?php

session_start();  
require '../AutoLoader.php';
AutoLoader::register();


if (isset($_POST['idPicture']) && isset($_SESSION['idUser'])){
       
    switch ($_POST['action']){

        case"Like":
            $this->ctrlVote = new ControllerVote();
            $this->ctrlVote->likePicture($idPicture,$idVoter);
            echo "success";
        break;
        case"Dislike":

        break;

    }








}