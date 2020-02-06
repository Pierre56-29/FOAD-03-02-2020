<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
</head>

<body>
<main class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex">
                <p><?php echo $picture->getFilename(); ?></p>
            </div>
            <div>
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
    </main>
</body>
