<?php session_start();?>
<form action="../index.php?action=Inscrire" method="POST">
    <input type="text" name = "login" placeholder="login"/>
    <input type="text" name = "email" placeholder="email"/>
    <input type="password" name = "password" placeholder="password"/>
    <input type="submit" name = "submit" value = "S'inscrire">
</form>