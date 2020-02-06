<head>
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/style.css">
    <title>AccueilNone</title>
</head>

<body>
<main class="container mt-4">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="carte card border-primary p-1 m-2">
                <div class="d-flex align-items-center text-white bg-primary pl-1 rounded">
                    <i class="fas fa-user"></i>
                    <p class="mx-auto my-auto pt-1 pb-1"><?php echo $picture["login"] ?></p>
                </div>
                
                <div class="photo border border-primary rounded mt-2">
                    <img class="image img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture" position="absolute"/>
                </div>
                <div class="mb-1">
                    <i class="fas fa-thumbs-up" id="like<?php echo $picture['idpicture']?>"><?php echo $picture['VoteLike'];?></i>
                    <i class="fas fa-thumbs-down" id="dislike<?php echo $picture['idpicture']?>"><?php echo $picture['VoteDislike'];?></i>
                </div>
                
                <p class="commentaire border border-primary rounded"><?php $tags = $picture["picture"]->getTags();
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
                <p class="commentaire border rounded"><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
            </div>   
    <?php } ?>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-lg-10 text-center">
            Sans être connecté, testez un upload de fichier pour obtenir un lien privé de votre image
        </div>
    </div>
    <form method="POST" action="index.php?action=UploadAnonymous" enctype="multipart/form-data">
    <div class="custom-file">

        <input type="file" class="custom-file-input" id="customFile" name="uploadedPicture">
        <label class="custom-file-label" for="customFile">Choisissez votre image</label>
    </div>
    <div class="form-group mt-5">
        <label for="filename">Choisissez un titre...</label>
        <input type="text" class="form-control" name="filename" id="filename" />
        
    </div>
    <div class="form-group mt-5">
    <label for="tagsImage">et taggez votre image</label>
        <input type="text"  data-role="tagsinput" name ="tags" id="tagsImages" placeholder="#tags"/>
  </div>
  <button type="submit" class="btn btn-primary">Uploader</button>
</form>
        <?php if(isset($_SESSION['messageRetour'])) { echo $_SESSION['messageRetour'];} ?>
</main>
</body>
<script>
    $('#customFile').change(function(event){
        var fileName = event.target.files[0].name;
        if (event.target.nextElementSibling!=null){
            event.target.nextElementSibling.innerText=fileName;
        }
    });
</script>
