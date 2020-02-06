<?php
session_start();  
require 'AutoLoader.php';
AutoLoader::register();

if (isset($_POST['actionlike'])){
    $routeur = new RouteurLikeDislike();
    $routeur->router();
    
}else{
    $routeur = new Routeur();
    $routeur->router();
}






