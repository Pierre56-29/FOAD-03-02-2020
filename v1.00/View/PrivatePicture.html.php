<main class="container mt-5">
    <div class="row">
        <div class="col-12">
            <p class="mx-auto my-auto"><?php echo $picture->getFilename(); ?></p>
            <div>
                <div class="border border-primary rounded mt-2 pl-1 pr-1 w-100 h-100 text-center">
                    <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
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
</main>