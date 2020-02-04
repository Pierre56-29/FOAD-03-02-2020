<?php

class View {
    
    public function render($file){
        include (__DIR__.'/../View/'.$file .'.html.php');
    }
}