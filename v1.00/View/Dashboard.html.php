

<main class="container mt-4">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="col-md-6 col-lg-3">
                <div>
                    <h4 class="text-center"><?php echo $picture->getFilename() ?></h4>
                </div>
                <div>
                    <input type="checkbox" data-toggle="toggle" data-on="Publique" data-off="Privé" class="custom-control-input" 
                    <?php if( $picture->getstatus() =="public") { echo 'checked'; } ?>>
                    <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                </div>
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

</main>