<?php

class CommentManager extends Modele
{
    public function add(Comment $comment)
    {
        $req ='INSERT INTO comment(title, content, idUser, idPicture) VALUES(?, ?, ?, ?)';

        $this->executeReq($req,array($comment->getTitle(), $comment->getContent(),$comment->getIdUser(), $comment->getIdPicture())); 
    
        return "Votre image a été ajouté avec succès";
    }
    public function getCommentsCountByPicture($idPicture)
    {
        $req = "SELECT COUNT(idComment) FROM comment WHERE idPicture = ? ";
        $res = $this->executeReq($req,array($idPicture));
        $res1 =$res->fetch(PDO::FETCH_ASSOC);
        return $res1;
    }

    public function getCommentsByPicture($idPicture) {
        $req = "SELECT * FROM comment WHERE idPicture = ? ";
        $res = $this->executeReq($req,array($idPicture));
        
        $comments = [];
        while($donnes =$res->fetch(PDO::FETCH_ASSOC))
        {
            $comment = new Comment();
            $comment->hydrate($donnes);
            $comments[] = $comment;
        }

        return $comments;
    }
}