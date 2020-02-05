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
                    <i class="fas fa-thumbs-up"><?php echo $picture['VoteLike'];?></i>
                    <i class="fas fa-thumbs-down"><?php echo $picture['VoteDislike'];?></i>
                    <img class="img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture"/>
                </div>
                <p><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
            </div>   
    <?php } ?>
    </div>

    <div class="row mt-5">
        <div class="col-lg-6 text-center">
            Sans être connecté, testez un upload de fichier pour obtenir un lien privé de votre image
        </div>
    </div>
    <form>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="pictureUpload">
        <label class="custom-file-label" for="customFile">Choisissez une image</label>
    </div>
    <div class="form-group">
    <label for="tagsImage">Taggez votre image</label>
    <input type="text" class="form-control" id="tagsImage">
  </div>
  <button type="submit" class="btn btn-primary">Uploader</button>
</form>

</main>

