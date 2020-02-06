<main class="container mt-4">
    <div class="row">
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="card border-primary m-1 p-1 col-md-6 col-lg-3">
                <div class="d-flex align-items-center text-white bg-primary pl-1 rounded">
                    <i class="fas fa-user"></i>
                    <p class="mx-auto my-auto pt-1 pb-1"><?php echo $picture["login"] ?></p>
                </div>
                
                <div class="mt-2 pl-1 pr-1 w-100 h-100 ">
                    <img class="img-fluid border border-primary rounded mt-2" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture" position="absolute"/>
                <div>
                    <i class="fas fa-thumbs-up"><?php echo $picture['VoteLike'];?></i>
                    <i class="fas fa-thumbs-down"><?php echo $picture['VoteDislike'];?></i>
                </div>
                </div>
                <p class="border rounded"><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
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
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
<script>

    $('.fa-thumbs-up').on('click',function(){
        if ($(this).hasClass("text-success")){
            $(this).removeClass("text-success");
        }else{
            $(this).addClass("text-success");   
            $(this).siblings().removeClass("text-danger")}
        
        $.ajax({
        url: "action.php",
        type: "POST",
        data:"",
        success:function(response){}}) 
    });   
            
    $('.fa-thumbs-down').on('click',function(){
        if ($(this).hasClass("text-danger")){
            $(this).removeClass("text-danger");
        }else{
            $(this).addClass("text-danger");   
            $(this).siblings().removeClass("text-success");}
            
    var data = $(resultats).serializeArray();
    $.ajax({
        url: "action.php",
        type: "POST",
        data:$(this),
        success:function(response){}})});
        
</script>