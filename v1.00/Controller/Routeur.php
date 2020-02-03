<?php

   class Routeur
   {
       private $ctrlArticle;
       private $ctrlUser;
       private $ctrlComment;

       public function router()
       {
        try {
            if(isset($_GET['action']))
            {
               switch($_GET['action'])
               {
                   case"Inscription" :
                    $this->ctrlUser = new ControleurUser();
                    $this->ctrlUser->pageInscription();
                   break;
                   case"Inscrire" :
                   $this->ctrlUser = new ControleurUser();
                   $this->ctrlUser->inscription($_POST['login'], $_POST['email'], $_POST['password'], $_POST['confpassword']);
                   break;
                   case"FinInscription" :
                    $this->ctrlUser = new ControleurUser();
                    $this->ctrlUser->verifInscriptionMail($_GET['login'],$_GET['cle']);
                   break;
                   case"Connexion" :
                    $this->ctrlUser = new ControleurUser();
                    $this->ctrlUser->pageConnexion();
                   break;
                   case"Deconnexion" :
                    $this->ctrlUser = new ControleurUser();
                    $this->ctrlUser->deconnexion();
                   case"ConfirmConnexion" :
                    $this->ctrlUser = new ControleurUser();
                   $this->ctrlUser->seConnecter($_POST['loginConnect'], $_POST['passwordConnect']);
                   break;
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
                
               }
            }
            else
            {
                $this->ctrlArticle = new ControleurArticle();
                if(isset($_GET['indexPage']))
                {
                    $this->ctrlArticle->accueil($_GET['indexPage']);   
                }
                else
                {
                    $this->ctrlArticle->accueil();
                }
            } 
        }
        catch (Exception $e)
        {
            $this->erreur($e->getMessage());
        }
       }

       private function erreur($msgErreur)
       {
           $vue = new Vue('Erreur');
           $vue->generer(array('messageRetour' => $msgErreur));
       }
   
   }





   
    
    
    