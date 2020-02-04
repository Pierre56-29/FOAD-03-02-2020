<?php

class CommentManager extends Modele
{
    public function getCommentsCountByArticle($idPicture)
    {
        $req = "SELECT COUNT(idComment) FROM comment WHERE idPicture = ? ";
        $res = $this->executeReq($req,array($idPicture));
        $res1 =$res->fetch(PDO::FETCH_ASSOC);
        return $res1;
    }
}