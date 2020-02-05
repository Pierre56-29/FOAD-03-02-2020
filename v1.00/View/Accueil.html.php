<main class="container mt-3">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="col-md-6 col-lg-3 card m-1 pt-1">
                <div class="d-flex align-items-center text-white bg-primary rounded pl-1">
                    <i class="fas fa-user"></i>
                    <p class="mx-auto my-auto"><?php echo $picture["login"] ?></p>
                </div>
                <div class="border border-primary rounded mt-2 pl-1 pr-1 w-100 h-100 text-center ">
                    <a href="index.php?action=PagePicture&Picture=<?php echo $picture['picture']->getIdPicture(); ?>">
                        <img class="img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture"/>
                    </a>
                </div>
                <div>
                    <i class="fas fa-thumbs-up"></i>
                    <i class="fas fa-thumbs-down"></i>
                </div>
                <p class="border border-primary rounded mt-2"><?php $tags = $picture["picture"]->getTags();
                         $tags = explode(",",$tags);
                         for($i = 0 ; $i <count($tags); $i++)
                         {
                             echo '#'. $tags[$i] . " ";
                             if ($i >= 2) { break;}
                         }    
                    ?>
                </p>
                <p class="border rounded"><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
            </div>   
    <?php } ?>
    </div>
    <?php
    if(isset($nbPages))
    {
        if ($nbPages > 1)
        { ?>
            <nav class="mt-5" aria-label="Page navigation example">
            <ul class="pagination">
        <?php
            if($indexPage > 1)
            { ?>
                <li class="page-item"><a class="page-link" href="index.php?indexPage=<?php echo ($indexPage-1); ?>">Précédent</a></li>
            <?php }
            for($i = 0; $i < 3 ; $i ++)
            {
                ?>  
                <li class="page-item"><a class="page-link" href="index.php?indexPage=<?php echo ($indexPage+$i); ?>"><?php echo ($indexPage+$i); ?></a></li>
            <?php
            if($indexPage+$i >= $nbPages)
            {
            break;
            }
            }
            if($indexPage < $nbPages)
            { ?>
                <li class="page-item"><a class="page-link" href="index.php?indexPage=<?php echo ($indexPage+1); ?>">Suivant</a></li>
           <?php }
        } ?>
        </ul>
        </nav>
    <?php }  ?> 
