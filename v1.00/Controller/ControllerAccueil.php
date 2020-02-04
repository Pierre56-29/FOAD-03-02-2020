<?php

class ControllerAccueil
{
    public function renderAccueilInscrit()
    {

    }

    public function renderAccueilAnonymous()
    {
        $picturesAccueil = new PictureManager();
        $pictures =$picturesAccueil->getPublicPictures(4);

        $resultat = [];
        forEach($pictures as $picture)
        {
            $commentsImage = new CommentManager();
            $comment =$commentsImage->getCommentsCountByArticle($picture->getIdPicture());
            
            $userName = new UserManager();
            $user = $userName->getUser($picture->getIdUser());

            $resultat[] = array("picture" => $picture,"CommentCount" => $comment, "login" => $user->getLogin());
        }
        $vue = new View("AccueilNonInscrit");
        $vue->generer(array("resultat" => $resultat));
    }

    public function renderDashboard()
    {

    }
}