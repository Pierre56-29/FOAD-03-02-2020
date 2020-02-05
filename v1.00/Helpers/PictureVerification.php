<?php

class PictureVerification {

    public function TraiterPicture($file)
    {
        if ($file['error'] == 0)
        {
            if($file['size'] <= 50000000) // si fichier inférieur à 5 méga
            {
                $infosFichier = pathinfo($file['name']);   // on divise le nom du fichier
                $extenstionFichier = $infosFichier['extension'];  // on récupère l'extension du fichier
                $authorizedFormat = array('JPG', 'jpg', 'jpeg', 'bmp', 'gif', 'png', 'PNG'); // liste des formats acceptés
                if(in_array($extenstionFichier, $authorizedFormat))
                {
                    $nameOnServer = date("d.m.y.s") . (rand(1,1000) * rand(3,564)) . "." . $extenstionFichier; // création nom aléatoire fichier
                    move_uploaded_file($file['tmp_name'], 'Uploads/' . $nameOnServer); // on envoie dans le dossier images

                    return ('Uploads/' . $nameOnServer);
                }
                else return "fichier nom compatible";
            }
            else {
                echo "Fichier trop lourd";
            }
        }
        else {
            return false;
        }
    }
}