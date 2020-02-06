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
            if(isset($_GET['action']) && !empty($_SESSION['login']))
            {
               switch($_GET['action'])
               {
            
                    case"Uploader" :
                        $this->ctrlPicture = new ControllerPicture();
                        $this->ctrlPicture->uploaderPicture($_POST['filename'],$_POST['status'], $_POST['tags'],$_FILES['uploadedPicture']);
                    break;
                    case"PageUpload" :
                        $this->ctrlPicture = new ControllerPicture();
                        $this->ctrlPicture->renderPageUpload();
                    break;
                    case"Deconnexion" :
                        $this->ctrlUser = new ControllerUser();
                        $this->ctrlUser->seDeconnecter();
                    break;
                    case"PageDashboard":
                        $this->ctrlAccueil = new ControllerAccueil();
                        if(isset($_GET['indexPage']))
                        {
                            $this->ctrlAccueil->renderDashboard($_GET['indexPage']);
                        }
                        else {
                            $this->ctrlAccueil->renderDashboard(1);
                        }
                    break;
                    case"PagePicture":
                        $this->ctrlPicture = new ControllerPicture();
                        $this->ctrlPicture->renderPicture($_GET['Picture']);
                    break;
                    case"Commenter":
                        $this->ctrlComment = new ControllerComment();
                        $this->ctrlComment->commenter($_POST['title'], $_POST['content'], $_POST['idPicture']);
                    break;
                    case "DeletePicture":
                        $this->ctrlPicture = new ControllerPicture();
                        if(isset($_GET['Picture']))
                        {
                            $this->ctrlPicture->deletePicture($_GET['Picture']);
                        }
                        else {
                            $this->ctrlPicture->deletePicture(0);
                        }
             
               }
            }
            else if(isset($_GET['action']))
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
                   $this->ctrlUser->inscription($_POST['login'], $_POST['email'], $_POST['password'],$_POST['passwordconfirm']);
                   break;

                   case"Connecter" :
                    $this->ctrlUser=new ControllerUser();
                    $this->ctrlUser->connexion($_POST['login'],$_POST['password']);
                   break;
                }
            }
            else
            {
               if(!empty($_SESSION['login']))
               {
                   $this->ctrlAccueil = new ControllerAccueil();
                   if(isset($_GET['indexPage']))
                   {
                        $this->ctrlAccueil->renderAccueilInscrit($_GET['indexPage']);
                   }
                   else {
                    $this->ctrlAccueil->renderAccueilInscrit();
                   }
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
   
   





   
    
    
    
