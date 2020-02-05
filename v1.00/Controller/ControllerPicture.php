<?php

class ControllerPicture
{
    public function uploaderPicture($filename, $status, $tags, $uploadedPicture)
    {
        if(isset($filename, $status, $tags, $uploadedPicture))
        {
            $filename=trim(htmlspecialchars($filename));
            $tags==trim(htmlspecialchars($tags));
            if($status ==="private" || $status ==="public")
            {
                $PictureVerification = new PictureVerification();
                $pictureUploaded = $PictureVerification->TraiterPicture($uploadedPicture);
                if ($pictureUploaded === "Fichier trop lourd !")
                {
    
                   $messageRetour = "fichier trop lourd";
                }
                else if($pictureUploaded === false) {
                    $messageRetour = "Erreur sur la taille du fichier, veuillez choisir une autre image, PHP.ini c'est vraiment de la ****";
                }
                else if($pictureUploaded === "fichier nom compatible")
                {
                    $messageRetour= "Format d'image non pris en charge !";
                }
                else
                {
                    $array = array("filename" => $filename, "status" => $status, "link" => $pictureUploaded, "tags" =>$tags, "idUser" => $_SESSION['idUser'] );
                    $picture = new Picture();
                    $picture->hydrate($array);
                    $pictureManager = new PictureManager();
                    $pictureManager->add($picture);
                    $messageRetour =" Image enregistrée avec succès !";
                }
            }
            else {
                $messageRetour = "L'image ne peut être que public ou privée !";
            }
        }
        else {
            $messageRetour = "veuillez renseigner tous les champs...";
        }
       $vue = new View("Uploader");
       $vue->generer(array("messageRetour" =>$messageRetour));
    }

    public function renderPageUpload()
    {
        $vue = new View("Uploader");
        $vue->generer();
    }

    public function renderPicture($idPicture, $messageRetour = "")
    {
        $pictureManager = new PictureManager();
        $picture = $pictureManager->getPublicPicture($idPicture);
    
        $commentsImage = new CommentManager();
        $comments =$commentsImage->getCommentsByPicture($idPicture);
        $commentsCount = count($comments);

        if($commentsCount > 0) // si j'ai des commentaires, je récupère le login de chacun
        {
            $renderComments =[];
            forEach($comments as $comment)
            {
                $userComment = new UserManager;
                $userComment = $userComment->getUser($comment->getIdUser());
                $renderComments[] = array("comment" => $comment, "userComment" => $userComment->getLogin());
            }
        }
        
        $userName = new UserManager(); // le username à qui appartient la photo
        $user = $userName->getUser($picture->getIdUser());
                    
        $resultat= array("picture" => $picture,"CommentCount" => $commentsCount,"login" => $user->getLogin(), "comments" => $renderComments, "messageRetour" => $messageRetour);

        $vue = new View("Picture");
        $vue->generer($resultat);

    }
}