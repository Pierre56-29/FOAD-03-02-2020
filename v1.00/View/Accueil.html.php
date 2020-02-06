<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <link rel="stylesheet" href="Css/style.css">
  <title>Accueil</title>
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
                    <a href="index.php?action=PagePicture&Picture=<?php echo $picture['picture']->getIdPicture(); ?>">
                        <img class="image img-fluid" src="<?php echo $picture["picture"]->getLink(); ?>" alt="picture"/>
                    </a>
                </div>
                <div>
                    <i class="fas fa-thumbs-up" id="like<?php echo $picture["idpicture"] ?>"><?php echo $picture['VoteLike'];?></i>
                    <i class="fas fa-thumbs-down" id="dislike<?php echo $picture["idpicture"] ?>"><?php echo $picture['VoteDislike'];?></i>
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
                <p class="commentaire border rounded"><?php if ($picture['CommentCount']["COUNT(idComment)"] > 0) {echo $picture['CommentCount']["COUNT(idComment)"] . "commentaires";} else {echo "Pas encore de commentaires !";} ?></p> 
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
    $('.fa-thumbs-up').on('click',function(){

        var idPicture = $(this).attr('id');
        idPicture = idPicture.slice(4)
        console.log(idPicture);

        idPicture = encodeURIComponent(idPicture);
        
        if ($(this).hasClass("text-success")){
            $(this).removeClass("text-success");

        }else{
            $(this).addClass("text-success");   
            $(this).siblings().removeClass("text-danger");

            $.ajax({
                url:"index.php",
                type: "POST",
                data: "actionlike=Like"+"&idPicture="+idPicture,
                success:function(){
                    console.log("done");
                },
                error:function(){
                    console.log("done");
                }
            })
            
        }
    });

        
 
            
    $('.fa-thumbs-down').on('click',function(){
        if ($(this).hasClass("text-danger")){
            $(this).removeClass("text-danger");
        }else{
            $(this).addClass("text-danger");   
            $(this).siblings().removeClass("text-success");}})

    
    
    
    </script>

    
    
     
