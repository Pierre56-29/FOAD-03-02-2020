<?php

$vote = new VoteManager;
$vote->likePicture(1,2);

if ($vote){
    echo "Success";
}else{
    echo "Request LIKE Error";
}

?>
