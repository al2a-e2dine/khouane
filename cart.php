<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['f'])) {
  $fact_id=$_GET['f'];
}

if (isset($_POST['submit1'])) {
  $art_type=$_POST['art_type'];
  $art_id=$_POST['client_id'];
  $client_id=$_POST['client_id'];
  $qte=$_POST['qte'];

  $q="INSERT INTO `cart`(`art_type`, `art_id`, `client_id`, `qte`) VALUES ('$art_type','$art_id','$client_id','$qte')";
  $r=mysqli_query($dbc,$q);
  //$msg="L'insertion terminée avec succès";
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

  <title>Panier</title>

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
          <h1 class="h3 mb-2 text-gray-800">Panier</h1>
          <p class="mb-4">kach manektbou hna ...</p>
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <a href="g_ventes.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block btn-primary">Gestion des ventes</button>
                </a>
              </div>
              <div class="col-md-4">
                <a href="vider_le_panier.php">
                  <button type="button" class="btn btn-warning btn-block">Vider le panier</button>
                </a>
              </div>
              <div class="col-md-4">
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #5f1411">Panier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Qte</th>
                      <th>Prix unitaire</th>
                      <th>Prix</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sum=0;
                    $q="SELECT * FROM `cart` WHERE fact_id='$fact_id' and archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if ($row['art_type']==1) {
                        $id=$row['art_id'];
                        $q0="SELECT * FROM `glasses` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>glasses_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }elseif ($row['art_type']==2) {
                      $id=$row['art_id'];
                        $q0="SELECT * FROM `glass` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>glass_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }elseif ($row['art_type']==3) {
                      $id=$row['art_id'];
                        $q0="SELECT * FROM `lenses` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>lenses_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }elseif ($row['art_type']==4) {
                      $id=$row['art_id'];
                        $q0="SELECT * FROM `implants` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>implants_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }elseif ($row['art_type']==5) {
                      $id=$row['art_id'];
                        $q0="SELECT * FROM `produit_entre` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>produit_entre_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }elseif ($row['art_type']==6) {
                      $id=$row['art_id'];
                        $q0="SELECT * FROM `other` WHERE id='$id'";
                        //echo $q0;exit();
                        $r0=mysqli_query($dbc,$q0);
                        $row0=mysqli_fetch_assoc($r0);
                    ?>
                    <tr>
                      <td>other_<?= $row0['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row0['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row0['prix_v'];
                      $sum=$sum+$prix;
                      ?>
                      <td><?= $prix ?> DA</td>
                      <td>
                        <a href="delete_from_cart.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-danger btn-block">Supprimer</button>
                        </a>
                      </td>
                    </tr>
                    <?php
                    }
                  }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <button type="button" class="btn btn-block btn-dark">Total : <?= $sum ?> DA</button>
              </div>
              <div class="col-md-4">
                <a href="invoice.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Facture</button>
                </a>
              </div>
            </div>
          </div>
          
          <br>

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
