<?php

class Database extends Modele
{
    private $bdd;
    private static $_instance;
    
    public static function getInstance()
    {
        if(!isset(self::$_instance))
        {
            self::$_instance = new DataBase();
        }
        
        return self::$_instance;
    }
    
    private function __construct()
    {        
     try
        {
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=foadPhotos','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->bdd = $bdd;
        }
            catch(Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getConnection()
    {
        return $this->bdd;
    }
   
}