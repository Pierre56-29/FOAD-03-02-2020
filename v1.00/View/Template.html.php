<head>
  <link rel="stylesheet" href="Css/bootstrap.min.css">
  <link rel="stylesheet" href="Css/fontAwesome.css">
</head>

<body>
<!--<nav class= "navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
    <div class="row">
        <div class="col">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    
        <div class="col">
        <a class="nav-link active" href="#">Tableau de bord</a>
        </div>

        <div class="col">
        <a class="nav-link active" href="#">Uploader </a>
        </div>

        <div class="col">
        <a class="nav-link active" href="#">Se connecter</a>
        </div>

        <div class="col">
        </div>

    </div>
</div>-->
<nav class="navbar navbar-light navbar-expand-lg bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <a class="navbar-brand" href="index.php">Logo</a>
    <ul class="col-xs-4 navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?action=PageDashboard">Tableau de bord</a>
      </li>
    </ul>
    <ul class="col-xs-4 navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=PageUpload">Uploader</a>
      </li>
    </ul>
    <ul class="col-xs-4 navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=Connexion">Se connecter</a>
      </li>
    </ul>
    <ul class="col-xs-4 navbar-nav mx-auto">
    
    </ul>
  </div>
  <form class="form-inline">
    <input type="text" class="col-xs-4 form-control" placeholder="Search">
  </form>
  
</nav>
<div> <?php echo $content; ?></div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
