<?php

class ControllerPicture
{
    public function uploaderPicture($filename, $status, $link, $tags, $iduser)
    {
        $array = array("filename" => $filename, "status" => $status, "link" => $link, "tags" =>$tags, "idUser" => $iduser );
        $picture = new Picture();
        $picture->hydrate($array);
        $pictureManager = new PictureManager();
        $pictureManager->add($picture);
    }
}