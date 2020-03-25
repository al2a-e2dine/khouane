<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['id'])) {
  $get_id=$_GET['id'];

  $q="SELECT * FROM `users` WHERE id='$get_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
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

  <title>Profil</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

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
          <?php
          $row=mysqli_fetch_assoc($r);
          ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">@<?= $row['username'] ?></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>A propos de moi</b></h5>
                            <p><b>Nom complet : </b><?= $row['fullname'] ?></p>
                            <p><b>E-mail : </b><?= $row['email'] ?></p>
                            <p><b>Numéro de téléphone : </b><?= $row['n_phone'] ?></p>
                            <p><b>Numéro CNI : </b><?= $row['n_cni'] ?></p>
                            <p><b>Adresse : </b><?= $row['adr'] ?></p>
                        </div>
                        <div class="col-md-6">
                          <p><b>date d'inscription : </b><?= $row['date'] ?></p>
                            <a href="update_emp.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Paramètres du compte</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_emp<?= $row['id'] ?>">Supprimer ce employer</button>

                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_emp<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un employé</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce employé ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_emp.php?id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1">
            <img src="img/avatar.jpg" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <br><br><br>
        </div>
    </div>
    <hr>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

    </div>
    <!-- End of Content Wrapper -->
<?php
        include 'footer.html';
        ?>
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
