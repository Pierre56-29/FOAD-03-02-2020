<?php
session_start();  
require 'AutoLoader.php';
AutoLoader::register();

$routeur = new Routeur();
$routeur->router();



