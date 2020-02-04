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
        var_dump($pictures);
        die();
        forEach($pictures as $picture)
        {
            $commentsImage = new CommentManager();
            $commentsImage->getCommentsCountByArticle($picture->getIdPicture());
            $picture['CommentsCount'] = $commentsImage;

            $userName = new UserManager();
            $userName->getUser();
        }
        $vue = new View("AccueilNonInscrit");
        $vue->generer();
    }

    public function renderDashboard()
    {

    }
}