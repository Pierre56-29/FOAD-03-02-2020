<?php

class ControllerPicture
{
    public function uploaderPicture($filename, $status, $tags, $iduser, $uploadedPicture)
    {
        if(isset($filename, $status, $link, $tags, $iduser, $uploadedPicture))
        {

            $PictureVerification = new PictureVerification();
            $pictureUploaded = $PictureVerification->TraiterPicture($uploadedPicture);
            if(preg_match("Uploads", $pictureUploaded))
            {
                $array = array("filename" => $filename, "status" => $status, "link" => $pictureUploaded, "tags" =>$tags, "idUser" => $iduser );
                $picture = new Picture();
                $messageRetour = $picture->hydrate($array);
                if($messageRetour === true)
                {
                    $pictureManager = new PictureManager();
                    $pictureManager->add($picture);
                }
            }
            else if ($pictureUploaded === "Fichier trop lourd")
            {

               $messageRetour = "fichier trop lourd";
            }
            else {
                $messageRetour = "erreur survenue";
            }
        }
        else {
            $messageRetour = "veuillez renseigner tous les champs...";
        }
        
    }
}