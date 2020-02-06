

<main class="container mt-4">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="col-md-6 col-lg-3 card m-1 pt-1">
                <div>
                    <h4 class="text-center text-white bg-primary rounded text-white bg-primary rounded pl-1  pt-1 pb-1"><?php echo $picture->getFilename() ?></h4>
                </div>
                <div>
                    <img class="img-fluid border border-primary rounded mt-2 mb-2" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                    <input type="checkbox" data-toggle="toggle" data-on="Publique" data-onstyle="primary" data-off="Privé" data-offstyle="default border" class="custom-control-input" 
                    <?php if( $picture->getstatus() =="public") { echo 'checked'; } ?>>
                    <a href="index.php?action=DeletePicture&Picture=<?php echo $picture->getIdPicture(); ?>"> <button class="btn btn-danger">Supprimer</button></a>
                </div>
                <p class="border border-primary rounded mt-2"><?php $tags = $picture->getTags();
                    if(strlen($tags) > 25)
                    {
                        $tags = substr($tags,0,24);
                        $tags .= "...";
                    }
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
                <li class="page-item"><a class="page-link" href="index.php?action=PageDashboard&indexPage=<?php echo ($indexPage-1); ?>">Précédent</a></li>
            <?php }
            for($i = 0; $i < 3 ; $i ++)
            {
                ?>  
                <li class="page-item"><a class="page-link" href="index.php?action=PageDashboard&indexPage=<?php echo ($indexPage+$i); ?>"><?php echo ($indexPage+$i); ?></a></li>
            <?php
            if($indexPage+$i >= $nbPages)
            {
            break;
            }
            }
            if($indexPage < $nbPages)
            { ?>
                <li class="page-item"><a class="page-link" href="index.php?action=PageDashboard&indexPage=<?php echo ($indexPage+1); ?>">Suivant</a></li>
           <?php }
        } ?>
        </ul>
        </nav>
    <?php }  ?> 

</main>