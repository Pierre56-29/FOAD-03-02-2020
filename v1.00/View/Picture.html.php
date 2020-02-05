<?php// var_dump($comments); die(); ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                <i class="fas fa-user"></i>
                <p><?php echo $login ?></p>
                <p><?php echo $picture->getFilename(); ?></p>
            </div>
            <div>
                <i class="fas fa-thumbs-up"></i>
                <i class="fas fa-thumbs-down"></i>
                <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
            </div>
            <div class="row">
                <div class="col-10">
                    <p><?php $tags = $picture->getTags();
                                $tags = explode(",",$tags);
                                for($i = 0 ; $i <count($tags); $i++)
                                {
                                    echo '#'. $tags[$i] . " ";
                                    if ($i >= 2) { break;}
                                }    
                        ?>
                    </p>
                </div>
                <div class="col-2">
                    <?php echo $picture->getDateUpload(); ?>
                </div>
            </div>
        </div>
    </div>
    
        <?php if($CommentCount > 1)
            {?>
               <h3>Les commentaires : </h3> 
               <div class="row bg-primary">
            <?php
                forEach($comments as $comment)
                { ?>
                    <div class ="col-12">
                        <h5> <?php echo $comment['comment']->getTitle(); ?> </h5>
                        <p> <?php echo $comment['comment']->getContent(); ?></p>
                        <p> Posté par <?php echo $comment['userComment']; ?> le <?php echo $comment['comment']->getDateComment(); ?></p>
                    </div>
            <?php }
            } 
                else 
                    {echo "<p> Pas encore de commentaires ! </p>";} ?> 
    </div>
    <form method="POST" action="index.php?action=Commenter">
        <h3>Vous voulez partager votre avis ? </h3>
        <div class="form-group">
            <label for="title">Titre de votre commentaire</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="CommentContnent">Le contenu de votre commentaire</label>
            <input type="text" class="form-control" name="content" id="CommentContnent">
        </div>
        <input type="hidden" name="idPicture" value=<?php echo  $picture->getIdPicture(); ?> />
        <button type="submit" class="btn btn-primary">Commenter</button>
        </form>
        <?php if(isset($messageRetour)) { echo $messageRetour;} ?>

</main>