<main class="container mt-5">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex">
                    <i class="fas fa-user"></i>
                    <p><?php echo $picture["login"] ?></p>
                </div>
                <div>
                    <i class="fas fa-thumbs-up"></i>
                    <i class="fas fa-thumbs-down"></i>
                    <img class="img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture"/>
                </div>
                <p><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
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
            for($i = 1; $i < $nbPages ; $i ++)
            {
                ?>  
                <li class="page-item"><a class="page-link" href="index.php?indexPage=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            if($i >= 4) { break;};
            }
            if($indexPage < $nbPages)
            { ?>
                <li class="page-item"><a class="page-link" href="index.php?indexPage=<?php echo ($indexPage+1); ?>">Suivant</a></li>
           <?php }
        } ?>
        </ul>
        </nav>
    <?php } ?> 

</main>