<form action="index.php?action=Uploader" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploadedPicture" />
    <p>Votre image doit faire moins de 5 méga</p>
    <input type="text" name = "filename" placeholder="filename"/>
    <input type="text" name = "status" value="public"/>
    <input type="text" name = "tags" placeholder="#tags"/>
    <input type="submit" name = "submit" value = "Uploader mon image">

    <p><?php if(isset($messageRetour)) { echo $messageRetour;} ?></p>
</form>