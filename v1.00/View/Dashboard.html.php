<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <link rel="stylesheet" href="Css/style.css">
  <title>Dashboard</title>
</head>

<body>
<main class="container mt-4">
    <div id="erreurSwitchStatus"></div>
    <div class="row">
        <?php 
            if(!empty($resultat))
            {
                forEach($resultat as $picture)
                {
        ?>
            <div class="carte card border-primary p-1 m-2">
            <div class="d-flex align-items-center text-white bg-primary pl-1 rounded">
                    <p class="mx-auto my-auto pt-1 pb-1"><?php echo $picture->getFilename() ?></p>
                </div>
                <div class="photo border border-primary rounded mt-2 ">
                <?php if($picture->getStatus() === "public")
                    {?>
                        <a id="link<?php echo $picture->getIdPicture(); ?>"href="index.php?action=PagePicture&Picture=<?php echo $picture->getIdPicture(); ?>">
                            <img class="image img-fluid " src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                        </a>
                    <?php }
                    else { ?>
                        <a id="link<?php echo $picture->getIdPicture(); ?>" href="index.php?action=PagePrivatePicture&Picture=<?php echo $picture->getIdPicture(); ?>">
                            <img class="image img-fluid " src="<?php echo $picture->getLink(); ?>" alt="picture"/>
                        </a>
                    <?php } ?>
                </div>  
                <div class="mt-2 mb-3">  
                    <input id="<?php echo $picture->getIdPicture(); ?>"  data-style="slow" data-width="125"type="checkbox" data-toggle="toggle" data-on="Publique" data-onstyle="primary" data-off="Privé" data-offstyle="default border" class="custom-control-input publicPrivateButton" 
                    <?php if( $picture->getstatus() =="public") { echo 'checked'; } ?>>
                    <a href="index.php?action=DeletePicture&Picture=<?php echo $picture->getIdPicture(); ?>"> <button class="btn btn-danger">Supprimer</button></a>
                </div>
                
                <p class="commentaire border border-primary rounded mt-2"><?php $tags = $picture->getTags();
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
            
        <?php }
            }
                else {
            echo "<p class='text-center mt-4'> Cliquez sur l'onglet 'Uploader' afin de remplir votre tableau de bord </p>";
        } ?>
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
</body>

<script>

$('.publicPrivateButton').change(function() {
    var status = $(this).prop('checked');
    var idPicture = $(this).attr('id');
    
    //on passe en public ou privé l'image

    $.ajax({
        url:"index.php",
        type: "POST",
        data: "ajax=SwitchStatusPicture"+"&idPicture="+idPicture+"&status="+status,
        success:function(){
            if(status === false)
            {
                $("#link"+idPicture).attr("href", "index.php?action=PagePrivatePicture&Picture="+idPicture);
            }
            else
            {
                $("#link"+idPicture).attr("href", "index.php?action=PagePicture&Picture="+idPicture);
            }
        },
        error:function(resultat){
            $("#erreurSwitchStatus").text(resultat);
        }
    });
});
     

</script>