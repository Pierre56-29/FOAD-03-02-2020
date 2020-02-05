<?php

class ControllerComment
{
    public function commenter($title, $content, $idPicture)
    {
        if(!empty($title) && !empty($content) && !empty($idPicture))
        {
            $title = trim(htmlspecialchars($title));
            $content = trim(htmlspecialchars($content));

            $array = array("title" => $title, "content" => $content, "idPicture" =>$idPicture,"idUser" => $_SESSION['idUser']);
            $commentObject = new Comment();
            $commentObject->hydrate($array);
            $comment = new CommentManager();
            $messageRetour = $comment->add($commentObject);
        }
        else {
            $messageRetour = "Remplissez tous les champs afin de pouvoir commenter !";
        }

        $ctrlPicture = new ControllerPicture();
        $ctrlPicture->renderPicture($idPicture, $messageRetour);
    }
}