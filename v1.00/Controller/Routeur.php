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
                   $this->ctrlUser->inscription($_POST['login'], $_POST['email'], $_POST['password']);
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
   
   





   
    
    
    
