<?php

class ControllerPicture
{
    public function uploaderPicture($filename, $status, $tags, $iduser, $uploadedPicture)
    {
        if(isset($filename, $status, $tags, $iduser, $uploadedPicture))
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
                    $messageRetour = "erreur survenue durant l'upload du fichier, veuillez recommencer.";
                }
                else
                {
                    $array = array("filename" => $filename, "status" => $status, "link" => $pictureUploaded, "tags" =>$tags, "idUser" => $iduser );
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
}