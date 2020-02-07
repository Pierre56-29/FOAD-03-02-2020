<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <link rel="stylesheet" href="Css/style.css">
  <title>Accueil</title>
</head>

<body>
<main class="container mt-4">
<div id="debug"></div>
<div class="row">
        
    <?php forEach($resultat as $picture)
    {
        ?>
            <div class="carte card border-primary p-1 m-2">
                <div class="d-flex align-items-center text-white bg-primary pl-1 rounded">
                    <i class="fas fa-user" data-toggle="tooltip" data-placement="top" title="<?php echo $picture['login'];?>"></i>
                    <p class="mx-auto my-auto pt-1 pb-1"><?php echo $picture['picture']->getFileName(); ?></p>
                </div>
                <div class="photo border border-primary rounded mt-2 ">
                    <a class="mx-auto my-auto" href="index.php?action=PagePicture&Picture=<?php echo $picture['picture']->getIdPicture(); ?>">
                        <img class="image img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture" position="absolute"/>
                    </a>
                </div>
                <div>
                    <i class="fas fa-thumbs-up" id="like<?php echo $picture['picture']->getIdPicture(); ?>"><span id="spanlike<?php echo $picture['picture']->getIdPicture() ?>"><?php echo $picture['VoteLike'];?></i>
                    <i class="fas fa-thumbs-down" id="dislike<?php echo $picture['picture']->getIdPicture(); ?>"><span id="spandislike<?php echo $picture['picture']->getIdPicture()?>"><?php echo $picture['VoteDislike'];?></i>
                </div>
                <p class="commentaire border border-primary rounded mt-2 "><?php $tags = $picture["picture"]->getTags();
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
                <p class="commentaire border rounded">
                    <?php 
                        if ($picture['CommentCount']["COUNT(idComment)"] > 1) {echo $picture['CommentCount']["COUNT(idComment)"] . " commentaires";}
                        else if($picture['CommentCount']["COUNT(idComment)"] == 1) { echo  "1 commentaire";} 
                        else {echo "Pas encore de commentaires !";} 
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
</body>
    
    
<script>
    
    $( document ).ready(function() { 
        $.ajax({
                    url:"index.php",
                    type: "POST",
                    dataType:'JSON',
                    data: "ajax=LikeLoading",
                    success:function(data){
                                                                     
                        $('#debug').text(data[0][1]["score"])
                    },
                    error:function(){
                    }
                }) 



        $('.fa-thumbs-up').on('click',function(){

            var idPicture = $(this).attr('id');
            idPicture = idPicture.slice(4)
            console.log(idPicture);

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
            console.log(idPicture);
           
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

    
    
     
