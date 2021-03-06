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
</head>

<body>
  <nav class="navbar navbar-light navbar-expand-lg bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a class="navbar-brand" href="index.php">WOW PICS</a>
    <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['login'])) 
      {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=PageDashboard">Tableau de bord</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=PageUpload">Uploader</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=Deconnexion">Se déconnecter</a>
          </li>
      </ul>
    </div>
    <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?action=Search">
      <input type="text" class="col-xs-4 form-control" placeholder="Rechercher" name="search">
    </form>
      <?php }
      else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=Connexion">Se connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=Inscription">S'inscrire</a>
          </li>
        </ul>
    </div>
      <?php } ?>    
    
  </nav>
<div> <?php echo $content; ?></div>



</body>
