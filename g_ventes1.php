<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['f'])) {
  $fact_id=$_GET['f'];
}else{
  header('location:g_stock.php');
}

if (isset($_POST['submit'])) {
  $fact_id=$_POST['fact_id'];
  $art_id=$_POST['art_id'];
  $qte=$_POST['qte'];

  $q_qte="SELECT * FROM `glasses` where id='$art_id'";
  $r_qte=mysqli_query($dbc,$q_qte);
  $row_qte=mysqli_fetch_assoc($r_qte);
  if($qte>$row_qte['qte']){
    header('location:g_ventes1.php?f='.$fact_id.'&alert=0');
  }

  $q0="SELECT * FROM `cart` WHERE `art_type`='1' and `art_id`='$art_id' and archived=0";
  //echo $q0;exit();
  $r0=mysqli_query($dbc,$q0);
  $num0=mysqli_num_rows($r0);
  //echo $num0;exit();

  if ($num0==1) {
    $row0=mysqli_fetch_assoc($r0);
    $qte0=$row0['qte'];

    $qte=$qte+$qte0;
    $id=$row0['id'];

    $q1="UPDATE `cart` SET `qte`='$qte' WHERE `id`='$id'";
    $r1=mysqli_query($dbc,$q1);
  }else{
    $q="INSERT INTO `cart`(`fact_id`, `art_type`, `art_id`, `qte`) VALUES ('$fact_id','1','$art_id','$qte')";
    //  echo $q;exit();
    $r=mysqli_query($dbc,$q);
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
          <h1 class="h3 mb-2 text-gray-800">Vendre des lunettes</h1>
          <p class="mb-4">kach manektbou hna ...</p>
          <?php
                if (isset($_GET['alert'])) {
                ?>
                <div class="alert alert-success">
                  <strong>Notification!</strong> La quantité n'est pas disponible
                </div>
                <?php
                }
                ?>
          <a href="g_ventes.php?f=<?= $fact_id ?>">
                  <button type="button" class="btn btn-block btn-primary">Gestion des ventes</button>
                </a>
          <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #5f1411">Nos Lunettes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Designation</th>
                      <th>Référence</th>
                      <th>Prix de vente</th>
                      <th>Qte</th>
                      <th>Ajouter au panier</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q="SELECT * FROM `glasses` WHERE archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                      if($row['qte']<=$row['seuil_min']){
                    ?>
                    <tr style="background-color: #ffebd9">
                    <?php
                      }else{
                    ?>
                    <tr>
                    <?php    
                      }
                    ?>
                      <td>glasses_<?= $row['id'] ?></td>
                      <td><?= $row['designation'] ?></td>
                      <td><?= $row['ref'] ?></td>
                      <td><?= $row['prix_v'] ?> DA</td>
                      <td><?= $row['qte'] ?></td>
                      <td>
                        <form action="g_ventes1.php?f=<?= $fact_id ?>" method="post">
                          <input type="number" class="form-control" placeholder="La quantité" name="qte">
                          <input type="hidden" name="fact_id" value="<?= $fact_id ?>">
                          <input type="hidden" name="art_id" value="<?= $row['id'] ?>">
                          <br>
                          <button type="submit" name="submit" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Ajouter au panier</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
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
