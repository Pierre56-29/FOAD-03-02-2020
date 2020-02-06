<?php

class RouteurLikeDislike{

    private $ctrlVote;

    public function router()
    {
        if (isset($_SESSION['idUser']) && isset($_POST['idPicture'])){
            
            switch ($_POST['actionlike']){
                
                
                case "Like":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->likePicture($_POST['idPicture'],$_SESSION['idUser']);
                break;
            }
        }
    }

}




