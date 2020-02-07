<?php

class RouteurAjax{

    private $ctrlVote;
    private $ctrlPicture;

    public function router()
    {
        if (isset($_SESSION['idUser']) && isset($_POST['idPicture'])){
            
            switch ($_POST['ajax']){
                
                case "Like":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->likePicture($_POST['idPicture']);
                    
                break;

                case "Unlike":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->unlikePicture($_POST['idPicture']);
                break;

                case "Dislike":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->dislikePicture($_POST['idPicture']);
                break;

                case "Undislike":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->undislikePicture($_POST['idPicture']);
                break;
                
               

                case"SwitchStatusPicture":
                    $this->ctrlPicture = new ControllerPicture();
                    $this->ctrlPicture->SwitchStatusPicture($_POST['idPicture'], $_POST['status']);
                break;
            }
        }else{
            switch ($_POST['ajax']){
                case "LikeLoading":
                    $this->ctrlVote = new ControllerVote;
                    $this->ctrlVote->loadLikesAndDislikes();
                    
                break;
            }
        }
    }

}




