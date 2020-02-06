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

    public function UploadAnonymous($filename,$tags, $uploadedPicture)
    {
        $_SESSION['messageRetour'] = "";
        if(isset($filename, $tags, $uploadedPicture))
        {
            $filename=trim(htmlspecialchars($filename));
            $tags==trim(htmlspecialchars($tags));

            $PictureVerification = new PictureVerification();
            $pictureUploaded = $PictureVerification->TraiterPicture($uploadedPicture);
            if ($pictureUploaded === "Fichier trop lourd !")
            {

                $_SESSION['messageRetour'] = "fichier trop lourd";
            }
            else if($pictureUploaded === false) {
                $_SESSION['messageRetour'] = "Erreur sur la taille du fichier, veuillez choisir une autre image, PHP.ini c'est vraiment de la ****";
            }
            else if($pictureUploaded === "fichier nom compatible")
            {
                $_SESSION['messageRetour']= "Format d'image non pris en charge !";
            }
            else
            {
                
                $urlImage = $this->creerUrl();
                $array = array("filename" => $filename, "status" => "private", "link" => $pictureUploaded, "tags" =>$tags, "urlAnonymous" => $urlImage );
                $picture = new Picture();
                $picture->hydrate($array);
                $pictureManager = new PictureManager();
                $pictureManager->add($picture);
                $vue = new View("LienAnonymous");
                $messageRetour = $urlImage;
                $vue->generer(array("messageRetour" =>$messageRetour));
                exit();
            }
            
        }
        else {
            $_SESSION['messageRetour'] = "veuillez renseigner tous les champs...";
        }
        header("Location: index.php");
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

        if($picture !== false)
        {

            $commentsImage = new CommentManager();
            $comments =$commentsImage->getCommentsByPicture($idPicture);
            $commentsCount = count($comments);

            $userName = new UserManager(); // le username à qui appartient la photo
            $user = $userName->getUser($picture->getIdUser());

            if($commentsCount > 0) // si j'ai des commentaires, je récupère le login de chacun
            {
                $renderComments =[];
                forEach($comments as $comment)
                {
                    $userComment = new UserManager;
                    $userComment = $userComment->getUser($comment->getIdUser());
                    $renderComments[] = array("comment" => $comment, "userComment" => $userComment->getLogin());
                }
           
            
           
                        
            $resultat= array("picture" => $picture,"CommentCount" => $commentsCount,"login" => $user->getLogin(), "comments" => $renderComments, "messageRetour" => $messageRetour);
            }
            else {
                $resultat= array("picture" => $picture,"CommentCount" => $commentsCount,"login" => $user->getLogin(), "messageRetour" => $messageRetour);
            }
            $vue = new View("Picture");
            $vue->generer($resultat);
        }
        else {
            $vue = new View("Error");
            $vue->generer(array('messageErreur' => "Vous ne pouvez pas accéder à cette image !"));
        }

    }

    public function renderPrivatePicture($idPicture)
    {
        $pictureManager = new PictureManager();
        $picture = $pictureManager->getPrivatePicture($idPicture);

        $vue = new View("PrivatePicture");
        $vue->generer(array("picture" => $picture ));

    }
    public function deletePicture($idPicture)
    {
        $idPicture = intval($idPicture);
        if($idPicture < 1)
        {
            $vue = new View("Error");
            $vue->generer(array('messageErreur' => "Cette image n'existe pas ou vous n'avez pas les droits petit chenapan!"));
        }
        else {
            $picture = new PictureManager();
            $picture = $picture->getPicture($idPicture);

            if ($picture === false || $picture->getIdUser() !== $_SESSION['idUser'])
            {
                $vue = new View("Error");
                $vue->generer(array('messageErreur' => "Cette image n'existe pas ou vous n'avez pas les droits petit chenapan!"));
            }
            else if( $picture->getIdUser() == $_SESSION['idUser'])
            {
                $pictureDelete = new PictureManager();
                $pictureDelete = $pictureDelete->delete($idPicture);
                if($pictureDelete === true)
                {
                    header("Location: index.php?action=PageDashboard");
                }
                else {
                    $vue = new View("Error");
                    $vue->generer(array('messageErreur' => "Une erreur est seurvenue, recommencez plus tard !"));
                }
            }
        }
    }

    public function showPictureAnonymous($urlPicture)
    {
        if($urlPicture === false)
        {
            $vue = new View("Error");
            $vue->generer(array('messageErreur' => "Etes vous sûr d'avoir entrer la bonne adresse pour l'image ???"));
        }
        else {
            $picture = new PictureManager();
            $picture = $picture->getAnonymousPicture($urlPicture);
            
            if($picture !== false)
            {
                $vue = new View("PictureAnonymous");
                $vue->genererAnonymous(array("picture" => $picture));
            }
            else {
                $vue = new View("Error");
                $vue->generer(array('messageErreur' => "Etes vous sûr d'avoir entrer la bonne adresse pour l'image ???"));
            }
        }
    }

    public function SwitchStatusPicture($idPicture, $status)
    {

        if($status === "true")
        {
            $status = "public";
        }
        else {
            $status ="private";
        }

        $picture = new PictureManager();
        $picture = $picture->getPicture($idPicture);

        if($picture === false)
        {
            echo "Votre image n'existe pas...";
        }
        else if($picture->getIdUser() === $_SESSION['idUser'])
        {
            $switchPicture = new PictureManager();
            $res = $switchPicture->changeStatusPicture($idPicture, $status);
            
            echo "Salut tu vas bien ?";
        }
        else {
            echo "Vous n'avez pas les droits pour changer le satut de cette image";
        }
    }

    public function search($search, $indexPage = 1)
    {
        $_SESSION['search'] = ""; // on enlève l'ancienne recherhce mise en mémoire;
        if($search ==="")
        {
            $vue = new View("Search");
            $vue->generer(array("messageRetour" => "Veuillez au moins remplir le champs de recherche..."));
        }
        else
        {
             //assainir données
            $search = trim(htmlspecialchars($search));
            $search = explode(" ",$search);

            // rechercher bdd
            $pictureSearch= new PictureManager();
            $res = $pictureSearch->searchPicture($search);
            
            if(empty($res))
            {
                $vue = new Vue("Search");
                $vue->generer(array("messageRetour" => "Pas de résultats pour cette recherche"));
            }
            else 
            {
                $picturesArray = $this->calculPoids($res, $search);

                if(count($picturesArray) > 1)
                {
                    $picturesSorted = $this->trierArticlesParPoids($picturesArray);
                }
                else {
                    $picturesSorted = $picturesArray;
                }
                // on enregistre les résultats de la recherche dans une variable pour les pages 2,3...
                $_SESSION['search'] = $picturesSorted;
             
                $this->genererSearch($indexPage, $picturesSorted);
             
                
            }
        }
    }

    public function genererSearch($indexPage, $picturesSorted)
    {
   
        if($picturesSorted === "")
        {
            $picturesSorted =  $_SESSION['search'];
        }
 
        $countPicture = count($picturesSorted);
        $nbPages = ceil(($countPicture/8));
        $indexDebut = $this->donnerIndexPageBdd($indexPage);
        $indexFin = count($picturesSorted) - $indexDebut;
        if($indexFin > 8) {$indexFin=8;} 
        // on prend que les 8 images ou les dernières pour la page en cours
    
        $pictureRender =[];
        for ($i = $indexDebut ; $i < $indexFin ; $i++)
        { 
            $pictureRender[] = $picturesSorted[$i];
        }

        $resultat = [];
        forEach($pictureRender as $picture)
        {
            $commentsImage = new CommentManager();
            $comment =$commentsImage->getCommentsCountByPicture($picture['idPicture']);
            
            $userName = new UserManager();
            $user = $userName->getUser($picture['idUser']);

            $votesImage = new VoteManager();
            $voteLike = $votesImage->getVotelike($picture['idPicture']);
            $voteDislike = $votesImage->getVoteDislike($picture['idPicture']);
                     
            $resultat[] = array("picture" => $picture,"CommentCount" => $comment,"login" => $user->getLogin(),"VoteLike" => $voteLike,  "VoteDislike" => $voteDislike,"login" => $user->getLogin());
        }


        $vue = new View("Search");
        $vue->generer(array("resultat" => $resultat, "nbPages" => $nbPages, "indexPage" => $indexPage));
    }

    private function creerUrl()
        {
            $caracteres = [
            '012345678901234567890123456',
            'azertyuiopmlkjhgfdsqwxcvbn',
            'AQWZSXEDCRFVTGBYHNUJIKOLPM'
            ];
            $mot ="";
            $length = rand(30,60);
            for($i = 0 ; $i < $length ; $i++)
            {
                $mot.=$caracteres[rand(0,2)][rand(0,25)]; 
            }
            $mot = trim($mot);
            $mot = str_shuffle($mot);
            return $mot;
        }
    
    private function calculPoids($picturesFound, $search)
    {
        $picturesArray = array();
        foreach($picturesFound as $picture) 
        {
          
            $lignePicture = array();

            //Remplir le tableau ligne article
            $lignePicture['idPicture'] = $picture->getIdPicture();
            $lignePicture['fileName'] = $picture->getFileName();
            $lignePicture['dateUpload'] = $picture->getDateUpload();
            $lignePicture['link'] =$picture->getLink();
            $lignePicture['tags'] = $picture->getTags();
            $lignePicture['idUser'] = $picture->getIdUser();
            $lignePicture['poids'] = 0;
            
           
            foreach ($search as $element) 
            {
                // mettre en gras et compter
                $lignePicture['fileName'] = preg_replace('#'.$element.'#i', "<b>{$element}</b>", $lignePicture['fileName'],-1,$count1);
                $lignePicture['tags'] = preg_replace('#'.$element.'#i', "<b>{$element}</b>", $lignePicture['tags'],-1,$count2);
                $poids = $count1 + $count2;
                //Mettre le poids fort
                $lignePicture['poids'] = $poids;
            }
           
            $picturesArray[] = $lignePicture;
        
        }
        return $picturesArray;
    }

    private function trierArticlesParPoids($tableau)
    {
        function ordonne($a, $b) {
            if ($a['poids'] == $b['poids']) {
                return 0;
            }
            return ($a['poids'] < $b['poids']) ? 1 : -1;
        }
        usort($tableau, "ordonne");
        return $tableau;
    }

    private function donnerIndexPageBdd($indexPage)
    {
        $index = 0;
        $page = htmlspecialchars($indexPage);    
        for ($i = 1; $i < $indexPage ; $i++)
        {
            $index +=8;
        }
        return $index;
    }

}