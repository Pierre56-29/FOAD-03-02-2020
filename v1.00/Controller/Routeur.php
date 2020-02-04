<?php

   class Routeur
   {
        private $ctrlUser;
        private $ctrlPicture;
        private $ctrlComment;
        private $ctrlAccueil;
        private $view;

       public function router()
       {
            if(isset($_GET['action']))
            {
               switch($_GET['action'])
               {
                   case"Inscription" :
                    $this->ctrlUser = new ControllerUser();
                    $this->ctrlUser->afficherPageInscription();
                   break;

                   case"Connexion" :
                    $this->ctrlUser = new ControllerUser();
                    $this->ctrlUser->afficherPageConnexion();
                    
                   break;

                   case"Inscrire" :
                   $this->ctrlUser = new ControllerUser();
                   $this->ctrlUser->inscription($_POST['login'], $_POST['email'], $_POST['password']);
                   break;

                   case"Connecter" :
                    $this->ctrlUser=new ControllerUser();
                    $this->ctrlUser->connexion($_POST['login'],$_POST['password']);
                   break;

                   case"Uploader" :
                    $this->ctrlPicture = new ControllerPicture();
                    $this->ctrlPicture->uploaderPicture($_POST['filename'],$_POST['status'], $_POST['tags'], $_POST['iduser'],$_FILES['uploadedPicture']);
                   break;
                   case"PageUpload" :
                    $this->ctrlPicture = new ControllerPicture();
                    $this->ctrlPicture->renderPageUpload();
                   break;
                   case"PageDashboard" :
                    $this->ctrlAccueil = new ControllerAccueil();
                    $this->ctrlAccueil->renderDashboard();
                   break;
                   case"Deconnexion" :
                    $this->ctrlUser = new ControllerUser();
                   $this->ctrlUser->seDeconnecter();
                   break;
                   /*
                   case"EcrireArticle" :
                    $this->ctrlArticle = new ControleurArticle();
                    $this->ctrlArticle->pageEcrireArticle();
                   break;
                   case"PosterArticle" :
                    $this->ctrlArticle = new ControleurArticle();
                    $this->ctrlArticle->posterArticle($_POST['titre'], $_POST['contenu'], $_POST['urlImage']);
                   break;
                   case"Article" :
                    if (isset($_GET['art']))
                    {
                        $this->ctrlArticle = new ControleurArticle();
                        if(isset($_GET['indexPage']))
                        {
                            $this->ctrlArticle->article($_GET['art'], $_GET['indexPage']);
                        }
                        else
                        {
                            $this->ctrlArticle->article($_GET['art']);
                        }
                    }
                   break;
                   case"Commenter" :
                    if (isset($_GET['art']))
                    {
                        $this->ctrlArticle = new ControleurArticle();
                        $this->ctrlArticle->ecrireCommentaire($_GET['art'], $_POST['pseudo'], $_POST['commentaire']);
                    }
                break;
                    case"RechercheArticle" :
                        if(isset($_GET['indexPage']))
                        {
                            $this->ctrlArticle = new ControleurArticle();
                            $this->ctrlArticle->rechercherArticle($_POST['barreRecherche'],$_GET['indexPage']);
                        }
                        else
                        {
                            $this->ctrlArticle = new ControleurArticle();
                            $this->ctrlArticle->rechercherArticle($_POST['barreRecherche']);
                        }
                   break;
                   case "suiteRechercheArticle" :
                        $this->ctrlArticle = new ControleurArticle();
                        $this->ctrlArticle->suiteRechercheArticle($_GET['indexPage']);
                    break;
                    case "PageNouveauMdp" :
                        $this->ctrlUser = new ControleurUser();
                        $this->ctrlUser->pageNouveauMdp();
                    break;
                    case"EnregistrerNouveauMdp" :
                        $this->ctrlUser = new ControleurUser();
                        if(isset($_POST['login']))
                        {
                            $this->ctrlUser->mdpOublie($_POST['login']);
                        }
                        else
                        {
                            $this->ctrlUser->mdpTropAncien($_POST['oldPassword'], $_POST['password'], $_POST['confPassword']);
                        }
                   break;
                */
               }
            }
            else
            {
               if(!empty($_SESSION['login']))
               {
                   $this->ctrlAccueil = new ControllerAccueil();
                   $this->ctrlAccueil->renderAccueilInscrit();
               }
               else 
               {
                $this->ctrlAccueil = new ControllerAccueil();
                $this->ctrlAccueil->renderAccueilAnonymous();
                } 
            }
       }
    }
/*
       private function erreur($msgErreur)
       {
           $vue = new Vue('Erreur');
           $vue->generer(array('messageRetour' => $msgErreur));
       }*/
   
   





   
    
    
    
