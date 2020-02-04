<?php

class ControllerAccueil
{
    public function renderAccueilInscrit()
    {

    }

    public function renderAccueilAnonymous()
    {
        $vue = new View("AccueilNonInscrit");
        $vue->generer();
    }

    public function renderDashboard()
    {
        
    }
}