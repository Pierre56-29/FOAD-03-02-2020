<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <title>Inscription</title>
</head>

<body>
<div class="container">
             <form method = "POST" action="index.php?action=Inscrire">
               <fieldset>
                 <legend>Formulaire d'inscription</legend>
                 
                 <div class="form-group">
                   <label for="login">Saisissez votre login</label>
                   <input type="text" class="form-control" id="login" name = "login" placeholder="login">
                 </div>

                 <div class="form-group">
                   <label for="email">Saisissez votre email</label>
                   <input type="email" class="form-control" id="email" name = "email" placeholder="email@gmail.com">
                 </div>

                 <div class="form-group">
                   <label for="password">Saisissez votre mot de passe</label>
                   <input type="password" class="form-control" id="password" name = "password"   placeholder="*****">
                   <label for="password">Confirmez votre mot de passe</label>
                   <input type="password" class="form-control" id="password" name = "passwordconfirm"   placeholder="*****">
                 </div>
                 
                 
                 <button class="btn btn-primary" type="submit" name ="submit ">S'inscrire</button>
                 
               </fieldset>
             </form>
         </div>
         <p><?php if(isset($messageErreur)) { echo $messageErreur; } ?></p>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

