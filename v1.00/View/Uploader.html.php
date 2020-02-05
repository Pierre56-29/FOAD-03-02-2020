<form action="index.php?action=Uploader" method="POST" enctype="multipart/form-data">
   
    <input type="file" name="uploadedPicture" />
    <p>Votre image doit faire moins de 5 méga</p>
    <input type="text" name = "filename" placeholder="filename"/>
   
    <select class="custom-select" name="status">
        <option selected value="public">Publique</option>
        <option value="private">Privée</option>
    </select>
    
    <input type="text"  data-role="tagsinput" name ="tags"/>
    
    <input type="submit" name = "submit" value = "Uploader mon image">

    <p><?php if(isset($messageRetour)) { echo $messageRetour;} ?></p>
</form>