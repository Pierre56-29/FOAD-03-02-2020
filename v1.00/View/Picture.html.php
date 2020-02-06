<?php// var_dump($comments); die(); ?>
<main class="container mt-5">
<div class="col-md-3 col-lg-8">
    <div class="row">
        <div class="col-12 card m-1 pt-1">
            <div class="d-flex align-items-center text-white bg-primary rounded pl-1 ">
                <i class="fas fa-user"></i>
                <p class="mx-auto my-auto"><?php echo $picture->getFilename(); ?></p>
                <p class="my-auto pl-1"><?php echo $login ?></p>
            </div>
            <div>
                <div class="border border-primary rounded mt-2 pl-1 pr-1 w-100 h-100 text-center">
                    <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                </div>
                <div>
                    <i class="fas fa-thumbs-up"></i>
                    <i class="fas fa-thumbs-down"></i>
                </div>
            </div>
            <div class="row">
                <div>
                    <p class="border border-primary rounded mt-2 ml-3 my-auto col-12"><?php $tags = $picture->getTags();
                                $tags = explode(",",$tags);
                                for($i = 0 ; $i <count($tags); $i++)
                                {
                                    echo '#'. $tags[$i] . " ";
                                    if ($i >= 2) { break;}
                                }    
                        ?>
                    </p>
                </div>
                <div class="font-italic text-right small">
                    <?php echo $picture->getDateUpload(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5">
             <form method = "POST" action="index.php?action=Inscrire">
               <fieldset>
    
            <?php if($CommentCount > 0)
            {?>
               <legend  class="col-md-6 text-primary">Les commentaires : </legend> 
               <div class="form group border rounded">
            <?php
                forEach($comments as $comment)
                { ?>
                    <div class ="col-12 overflow-auto">
                        <h5 class="font-weight-bold text text-primary"> <?php echo $comment['comment']->getTitle(); ?> </h5>
                        <p > <?php echo $comment['comment']->getContent(); ?></p>
                        <p class="font-italic text-right small"> Posté par <?php echo $comment['userComment']; ?> le <?php echo $comment['comment']->getDateComment(); ?></p>
                    </div>
            <?php }
            } 
                else 
                    {echo "<p> Pas encore de commentaires ! </p>";} ?> 
    </div>
</div>
</main>