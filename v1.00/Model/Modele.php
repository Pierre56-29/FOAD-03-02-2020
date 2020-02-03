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
}

































