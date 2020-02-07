<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <link rel="stylesheet" href="Css/style.css">
  <title></title>
</head>
<main class="container mt-4">
    <div class="row">
        <div class="col-12 card m-1 pt-1">
            <div class="d-flex align-items-center text-white bg-primary rounded pl-1 ">
                <p class="mx-auto my-auto"><?php echo $picture->getFilename(); ?></p>
               <!-- <p class="my-auto"><?php echo $login ?></p> -->
            </div>
            <div>
                <div class="border border-primary rounded mt-2 pl-1 text-center">
                    <img class="img-fluid" src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                </div>
                <div>
                    <i class="fas fa-thumbs-up" id="like<?php echo $picture->getIdPicture(); ?>"><span id="spanlike<?php echo $picture->getIdPicture() ?>"><?php echo $VoteLike;?></i>
                    <i class="fas fa-thumbs-down" id="dislike<?php echo $picture->getIdPicture(); ?>"><span id="spandislike<?php echo $picture->getIdPicture() ?>"><?php echo $VoteDislike;?></i>
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
                <div class="font-italic text-right small col-10">
                    <?php  $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $picture->getDateUpload());
                            echo "le " . $datetime->format("d/m/Y à H:i:s"); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5">
    
            <?php if($CommentCount > 0)
            {?>
               <legend  class="col-md-6 text-primary">Les commentaires : </legend> 
               <div class="groupe-commentaire form group border rounded">
            <?php
                forEach($comments as $comment)
                { ?>
                    <div class ="col-12 overflow-x:scroll">
                        <h5 class="font-weight-bold text text-primary"> <?php echo $comment['comment']->getTitle(); ?> </h5>
                        <p > <?php echo $comment['comment']->getContent(); ?></p>
                        <p class="font-italic text-right small"> Posté par <?php echo $comment['userComment']; ?> le 
                        <?php  $datetime = DateTime::createFromFormat("Y-m-d H:i:s", $comment['comment']->getDateComment());
                                echo $datetime->format("d/m/Y à H:i:s"); ?></p>
                       
                    
                    </div>
            <?php }
            } 
                else 
                    {echo "<p> Pas encore de commentaires ! </p>";} ?> 
    </div>
    <form method="POST" action="index.php?action=Commenter">
        <h3>Vous voulez partager votre avis ? </h3>
        <div class="form-group">
            <label for="title">Titre de votre commentaire</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="CommentContnent">Le contenu de votre commentaire</label>
            <input type="text" class="form-control" name="content" id="CommentContnent">
        </div>
        <input type="hidden" name="idPicture" value=<?php echo  $picture->getIdPicture(); ?> />
        <button type="submit" class="btn btn-primary">Commenter</button>
        </form>
        <?php if(isset($messageRetour)) { echo $messageRetour;} ?>
</main>
</body>
<script>
    
    $(window).on('load',function() { 
        $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=LikeLoading",
                    success:function(data){

                        $.each(data[0],function(key,value){


                            console.log(value);
                            console.log(value.score);
                            console.log(value.idPicture);

                            if(value.score==1){
                                $("#like"+value.idPicture).addClass("text-success") 
                            }else if(value.score=="-1"){
                                $("#dislike"+value.idPicture).addClass("text-danger")
                            }
                        
                        });
                        
                       
                    },
                    error:function(){
                    }
                }) 

    });
    $(document ).ready(function() { 
        $('.fa-thumbs-up').on('click',function(){

            var idPicture = $(this).attr('id');
            idPicture = idPicture.slice(4)
           
            idPicture = encodeURIComponent(idPicture);
            
            if ($(this).hasClass("text-success")){
                $(this).removeClass("text-success");
                $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=Unlike"+"&idPicture="+idPicture,
                    success:function(data){
                        
                                                
                        $('#spanlike'+idPicture).text(data.like)
                        $('#spandislike'+idPicture).text(data.dislike)
                    },
                    error:function(){
                    }
                }) 
            }else{
                $(this).addClass("text-success");   
                $(this).siblings().removeClass("text-danger");
                $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=Like"+"&idPicture="+idPicture,
                    success:function(data){
                        
                        $('#spanlike'+idPicture).text(data.like)
                        $('#spandislike'+idPicture).text(data.dislike)
                    },
                    error:function(){
                    }
                })
            }    
        });
            
        $('.fa-thumbs-down').on('click',function(){
            var idPicture = $(this).attr('id');
            idPicture = idPicture.slice(7)
                       
            idPicture = encodeURIComponent(idPicture);


            if ($(this).hasClass("text-danger")){
                $(this).removeClass("text-danger");
                $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=Undislike"+"&idPicture="+idPicture,
                    success:function(data){
                        
                        
                        $('#spanlike'+idPicture).text(data.like)
                        $('#spandislike'+idPicture).text(data.dislike)
                    },
                    error:function(){
                    }
                }) 

            }else{
                $(this).addClass("text-danger");   
                $(this).siblings().removeClass("text-success")
                $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=Dislike"+"&idPicture="+idPicture,
                    success:function(data){
                        
                        $('#spanlike'+idPicture).text(data.like)
                        $('#spandislike'+idPicture).text(data.dislike)
                    },
                    error:function(){
                    }
                })}})
    });   
    </script>
