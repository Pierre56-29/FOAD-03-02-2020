<head>
<link rel="stylesheet" href="Css/fontAwesome.css">
  <link rel="stylesheet" href="Css/bootstrap-tagsinput.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="Css/bootstrap-tagsinput.js"></script>
  <title></title>
</head>
<body>
<div class="container mt-5">
    <p class="text-center font-weight-bold text text-primary"> Votre image a été enregistrée avec succès !!! </p>
    <p class="text-center">Voici le lien pour votre image maintenant disponible sur tous les internets (WOW) : </p>
    <p class="text-center">Conservez cette Url : <a href="index.php?MyPicture=Anonymous&Picture=<?php if(isset($messageRetour)) { echo $messageRetour;} ?>">index.php?MyPicture=Anonymous&Picture=<?php if(isset($messageRetour)) { echo $messageRetour;} ?></a></p>
</div>
</body>
