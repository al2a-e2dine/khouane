<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Catégories</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" style="background-color: #e8c7d0">

  <!-- Page Wrapper -->
  <div id="wrapper">

        <?php
    include 'sidebar.html';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include 'topbar.html';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2" style="color: #5f1411">Catégories</h1>
          <p class="mb-4">kach manektbou hna ...</p>

          <div class="container-fluid" id="needs">
          <div class="row">

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_glasse.php">
                <img class="card-img-top" src="img/cat1.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_glasse.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter lunettes</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_glass.php">
                <img class="card-img-top" src="img/cat2.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_glass.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter verres</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_lenses.php">
                <img class="card-img-top" src="img/cat3.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_lenses.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter les lentilles</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_implant.php">
                <img class="card-img-top" src="img/cat4.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_implant.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter implant</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_produit_ent.php">
                <img class="card-img-top" src="img/cat5.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_produit_ent.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter un produit d'entretien</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="add_autres.php">
                <img class="card-img-top" src="img/cat6.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="add_autres.php">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Autres</button>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
      include 'footer.html';
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
