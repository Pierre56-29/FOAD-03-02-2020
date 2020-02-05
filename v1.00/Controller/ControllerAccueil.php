<?php

class ControllerAccueil
{
    public function renderAccueilInscrit($indexPage = 1)
    {
        if (isset($indexPage)) // je récupère l'index bas des photos pour la page en cours
        {
           $indexPictures = $this->donnerIndexPageBdd($indexPage);
        }

        $accueil = new PictureManager();
        $picturesCount =$accueil->getCountPublicPictures(); // le nombre d'images public en bdd
        $nbPages = ceil(($picturesCount['pictureCount'])/8); // le nombre de pages que cela représente avec 8 photos par pages
        
        $pictures = $accueil->getPublicPictures(); // je récupère toutes les images publiques

        if($indexPage < 2) // si page 1, on prend les 8 premières pictures, sinon en fonction de la page.
        {
            $pictures = array_slice($pictures, 0, 8);
        }
        else {
            $pictures = array_slice($pictures,$indexPictures,8);
        }

        $resultat = [];
        forEach($pictures as $picture)
        {
            $commentsImage = new CommentManager();
            $comment =$commentsImage->getCommentsCountByArticle($picture->getIdPicture());
            
            $userName = new UserManager();
            $user = $userName->getUser($picture->getIdUser());

            
                     
            $resultat[] = array("picture" => $picture,"CommentCount" => $comment,"login" => $user->getLogin());
        }

        $vue = new View("Accueil");
        $vue->generer(array("nbPages" => $nbPages, "resultat" => $resultat, "indexPage" => $indexPage));
        
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

            $votesImage = new VoteManager();
            $voteLike = $votesImage->getVotelike($picture->getIdPicture());
            $voteDislike = $votesImage->getVoteDislike($picture->getIdPicture());

            $pictureid = new Picture();
            $pictureid = $picture->getIdPicture();



            $resultat[] = array("picture" => $picture,"CommentCount" => $comment, "VoteLike" => $voteLike,  "VoteDislike" => $voteDislike,"login" => $user->getLogin(),"idpicture" => $pictureid);
        }
        $vue = new View("AccueilNonInscrit");
        $vue->generer(array("resultat" => $resultat));
    }

    public function renderDashboard($indexPage = 1)
    {
        if (isset($indexPage)) 
        {
           $indexPictures = $this->donnerIndexPageBdd($indexPage);
        }

        $dashboard = new PictureManager();
        $dashboard = $dashboard->getPicturesDashboard($_SESSION['idUser']); // $dashboard contient toutes les images du user
        $picturesCount = count($dashboard); // je compte le nombre d'images
        $nbPages = ceil(($picturesCount['pictureCount'])/8); // j'en déduis le nombre de pages possibles

        if($indexPage < 2) // si page 1, on prend les 8 premières pictures, sinon en fonction de la page.
        {
            $pictures = array_slice($dashboard, 0, 8);
        }
        else {
            $pictures = array_slice($dashboard,$indexPictures,8);
        }
        
        $vue = new View("Dashboard");
        $vue->generer(array("nbPages" => $nbPages, "resultat" => $dashboard, "indexPage" => $indexPage));
        
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