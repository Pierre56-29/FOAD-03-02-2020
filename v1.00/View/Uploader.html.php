<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <title>Uploader</title>
</head>

<body>
<div class="container pt-5">
             <form method = "POST" action="index.php?action=Uploader" enctype="multipart/form-data">
               <fieldset>
                 <legend class="col-md-3 text-primary">Uploader</legend>

                 <div class="form-group col-md-3">
                   <input type="file" name="uploadedPicture">
                   <p>Votre image doit faire moins de 5 méga</p>
                   <label for="filename">Nommez votre fichier</label>
                   <input type="text" name = "filename" placeholder="filename" class="border rounded"/>
                 </div>

                 <div class="form-group col-md-3">
                   <select class="custom-select" name="status">
                   <option selected value="public">Publique</option>
                   <option value="private">Privée</option>
                 </div>

                 <div class="form-group col-md-3">
                 <input type="text"  data-role="tagsinput" name ="tags" placeholder="#tags" tabindex="-1" />
                 </div>
                 
                 <div class="form-group col-md-3">
                 <input type="submit" name = "submit" value = "Uploader mon image" >
                 </div>

               </fieldset>
             </form>
         </div>
         <p><?php if(isset($messageRetour)) { echo $messageRetour; } ?></p>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

