<main class="container mt-4">
    <div class="row">
        <div class="col-12 card m-1 pt-1">
            <div class="d-flex align-items-center text-white bg-primary rounded pl-1">
            <p class="mx-auto my-auto"><?php echo $picture->getFilename(); ?></p>
            </div>
            <div>
                <div class="border border-primary rounded mt-2 pl-1 text-center">
                    <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                </div>
            </div>
            <div class="row">
                <div>
                    <p class="commentaire border border-primary rounded mt-2 ml-3 my-auto col-12 "><?php $tags = $picture->getTags();
                                $tags = explode(",",$tags);
                                for($i = 0 ; $i <count($tags); $i++)
                                {
                                    echo '#'. $tags[$i] . " ";
                                    if ($i >= 2) { break;}
                                }    
                        ?>
                    </p>
            </div>
            <div class="font-italic text-right small col-10">
            <?php  $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $picture->getDateUpload());
                    echo "le " . $datetime->format("d/m/Y à H:i:s"); ?>
            </div>
        </div>
    </div>
</main>