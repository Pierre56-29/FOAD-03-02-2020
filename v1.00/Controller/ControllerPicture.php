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
                    $messageRetour = $uploadedPicture['error'];
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
}