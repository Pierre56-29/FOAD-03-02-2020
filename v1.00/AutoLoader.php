<?php

 class AutoLoader
 {

    static function register()
    {
        spl_autoload_register(array(__CLASS__,'autoLoad'));
    }

    static function autoLoad($className)
    {
        $directories = array("controller", "model", "view");

        foreach($directories as $directory)
        {
            $file = $directory .'\\' . $className . '.php';
            if(file_exists($file))
            {
                require $directory .'\\' . $className . '.php';
            break;
            }
        }   
    }
 }