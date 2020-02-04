<?php

Abstract class Modele
{

  protected function executeReq($req, $params = null)
  {
   
   $bdd = Database::getInstance() -> getConnection();

    if($params == null)
    {
      $res = $bdd->query($req);
    }
    else
    {
      $res = $bdd->prepare($req);
      $res->execute($params);
    }
    return $res;
  }

  function hydrate(array $donnees){

    foreach ($donnees as $key => $value ){
        $method = 'set'.ucfirst($key);

        if(method_exists($this,$method)){
          $setter =$this->$method($value);
        }
    }
  }
}



































