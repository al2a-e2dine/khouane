<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['id'])) {
  $get_id=$_GET['id'];

  $q="SELECT * FROM `other` WHERE id='$get_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
}

if (isset($_POST['submit'])) {
  $designation=$_POST['designation'];
  $fournisseur_id=$_POST['fournisseur_id'];
  $qte=$_POST['qte'];
  $seuil_min=$_POST['seuil_min'];
  $prix_a=$_POST['prix_a'];
  $prix_v=$_POST['prix_v'];
  $get_id=$_POST['get_id'];

      $q="UPDATE `other` SET `designation`='$designation',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
      $r=mysqli_query($dbc,$q);
      $msg="La modification terminée avec succès";
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

  <title>Modifier autres</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #e8c7d0">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="background-color: #ff86a7">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 mb-4" style="color: #5f1411">Modifier autres</h1>
                <?php
                if (isset($msg)) {
                ?>
                <div class="alert alert-success">
                  <strong>Notification!</strong> <?= $msg ?>
                </div>
                <?php
                }
                ?>
              </div>
              <?php
              $q="SELECT * FROM `other` WHERE id='$get_id'";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              ?>
              <form class="user" action="update_other.php?id=<?= $get_id ?>" method="post">
                <div class="form-group">
                  <!-- <label>Désignation</label> -->
                    <input type="text" class="form-control form-control-user" value="<?= $row['designation'] ?>" name="designation" required>
                </div>
                <div class="form-group">
                  <label for="sel1">Fournisseur</label>
                  <select class="form-control" id="sel1" name="fournisseur_id" required>
                    <?php
                    $f_id=$row['id'];
                    $qff="SELECT * FROM `suppliers` where id='$f_id'";
                    $rff=mysqli_query($dbc,$qff);
                    $rowff=mysqli_fetch_assoc($rff);
                    ?>
                    <option value="<?= $rowff['id'] ?>"><?= $rowff['fullname'] ?></option>
                    <?php
                    $qf="SELECT * FROM `suppliers` where archived=0";
                    $rf=mysqli_query($dbc,$qf);
                    while ($rowf=mysqli_fetch_assoc($rf)) {
                    ?>
                    <option value="<?= $rowf['id'] ?>"><?= $rowf['fullname'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <!-- <label>La quantité</label> -->
                  <input type="number" class="form-control form-control-user" value="<?= $row['qte'] ?>" name="qte" required>
                </div>
                <div class="form-group">
                  <!-- <label>Seuil minimal</label> -->
                  <input type="number" class="form-control form-control-user" value="<?= $row['seuil_min'] ?>" name="seuil_min" required>
                </div>
                <div class="form-group">
                  <!-- <label>Prix d'achat</label> -->
                  <input type="number" class="form-control form-control-user" value="<?= $row['prix_a'] ?>" name="prix_a" required>
                </div>
                <div class="form-group">
                  <!-- <label>Prix de vente</label> -->
                  <input type="number" class="form-control form-control-user" value="<?= $row['prix_v'] ?>" name="prix_v" required>
                </div>
                
                <input type="hidden" name="get_id" value="<?= $get_id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block" value="Mise a jour" style="background-color: #e8c7d0; color: #5f1411">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="g_stock.php" style="color: #5f1411">Gestion de stock</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php" style="color: #5f1411">Page d'accueil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

