<?php
session_start();  
require 'AutoLoader.php';
AutoLoader::register();

if (isset($_POST['ajax'])){
    $routeur = new RouteurAjax();
    $routeur->router();
    
}else{
    $routeur = new Routeur();
    $routeur->router();
}






