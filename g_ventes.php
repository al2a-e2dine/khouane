<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['f'])) {
  $fact_id=$_GET['f'];
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

  <title>Gestion des ventes</title>

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
          <h1 class="h3 mb-2" style="color: #5f1411">Gestion des ventes</h1>
          <p class="mb-4">kach manektbou hna ...</p>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <a href="cart.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block btn-dark">Panier</button>
                </a>
              </div>
              <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#add_fact">Nouvelle facture</button>
                  <!-- Logout Modal-->
                            <div class="modal fade" id="add_fact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color: #5f1411">Nouvelle facture</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="container">
                                  <form class="user" action="g_stock.php" method="post">
                                    <a href="add_client.php" style="color: #5f1411">Ajouter un nouveau client</a>
                                    <div class="form-group">
                                      <label for="sel1">Client</label>
                                      <select class="form-control" id="sel1" name="client" required>
                                        <option></option>
                                        <?php
                                        $q="SELECT * FROM `customers` where archived=0";
                                        $r=mysqli_query($dbc,$q);
                                        while ($row=mysqli_fetch_assoc($r)) {
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['fullname'] ?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-user btn-block" value="Créer une nouvelle facture" style="background-color: #e8c7d0; color: #5f1411">
                                  </form>
                                  <br>
                                  </div>
                                </div>
                              </div>
                            </div>
              </div>
            </div>
          </div>
          <br>

          <div class="container-fluid" id="needs">
          <div class="row">

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes1.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat1.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes1.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre des Lunettes</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes2.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat2.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes2.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre des Verres</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes3.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat3.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes3.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre des Lentilles</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes4.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat4.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes4.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre des Implants</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes5.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat5.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes5.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre des Produits d'entretien</button>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <a href="g_ventes6.php?f=<?= $fact_id ?>">
                <img class="card-img-top" src="img/cat6.jpg" alt="Card image cap">
                </a>
                <div class="card-body">
                  <a href="g_ventes6.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Vendre Autres accessoires</button>
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

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Entreprise 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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
