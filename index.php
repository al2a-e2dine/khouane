<?php
include_once 'connect.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Page d'accueil</title>

    <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">

    <style type="text/css">
      .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #4e73df;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

/*carousel*/
/* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
    </style>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #e8c7d0">
        <a class="navbar-brand" href="index.php" style="color: #5f1411">KHOUANE'S OPTICS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <?php
            if (isset($_SESSION['user_id'])) {
              $id=$_SESSION['user_id'];
            ?>
            <li class="nav-item">
              <a class="nav-link" href="profil.php?id=<?=$id?>" style="color: #5f1411"><?= $_SESSION['user_fullname'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php" style="color: #5f1411">Se déconnecter</a>
            </li>
            <?php
            }else{
            ?>
            <li class="nav-item">
              <a class="nav-link" href="register.php" style="color: #5f1411">S'inscrire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" style="color: #5f1411">S'identifier</a>
            </li>
            <?php
            }
            ?>
            
          </ul>
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/g_employes.jpg" alt="g_employes" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/g_clients.jpg" alt="g_ventes" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/g_ventes.jpg" alt="g_ventes" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

        <div class="container-fluid" id="needs">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_employes.php">
                <img class="card-img-top" src="img/g_employes.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_employes.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Gestion des employés</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_clients.php">
                <img class="card-img-top" src="img/g_clients.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_clients.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0;color: #5f1411">Gestion des clients</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_fournisseurs.php">
                <img class="card-img-top" src="img/g_fournisseurs.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_fournisseurs.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0;color: #5f1411">Gestion des fournisseurs</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_stock.php">
                <img class="card-img-top" src="img/g_stock.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_stock.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0;color: #5f1411">Gestion de stock</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes.html">
                <img class="card-img-top" src="img/g_ventes.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes.html">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0;color: #5f1411">Gestion des ventes</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_autres.html">
                <img class="card-img-top" src="img/g_autres.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_autres.html">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0;color: #5f1411">Autres</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
<hr>
<!-- /.container -->
      
      <?php
      include 'footer.html';
      ?>

    </main>

    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  </body>
</html>
