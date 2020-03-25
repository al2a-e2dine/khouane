<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  $fullname=$_POST['fullname'];
  $sexe=$_POST['sexe'];
  $age=$_POST['age'];
  $n_phone=$_POST['n_phone'];

  $lun_d_sph=$_POST['lun_d_sph'];
  $lun_d_cyl=$_POST['lun_d_cyl'];
  $lun_d_axe=$_POST['lun_d_axe'];
  $lun_g_sph=$_POST['lun_g_sph'];
  $lun_g_cyl=$_POST['lun_g_cyl'];
  $lun_g_axe=$_POST['lun_g_axe'];
  $lun_ep=$_POST['lun_ep'];

  $len_d_sph=$_POST['len_d_sph'];
  $len_d_cyl=$_POST['len_d_cyl'];
  $len_d_axe=$_POST['len_d_axe'];
  $len_g_sph=$_POST['len_g_sph'];
  $len_g_cyl=$_POST['len_g_cyl'];
  $len_g_axe=$_POST['len_g_axe'];
  $len_rayon=$_POST['len_rayon'];
  $len_diametre=$_POST['len_diametre'];

  //echo
  /*echo $fullname."<br>";
  echo $sexe."<br>";
  echo $age."<br>";
  echo $n_phone."<br>";

  echo $lun_d_sph."<br>";
  echo $lun_d_cyl."<br>";
  echo $lun_d_axe."<br>";
  echo $lun_g_sph."<br>";
  echo $lun_g_cyl."<br>";
  echo $lun_g_axe."<br>";
  echo $lun_ep."<br>";

  echo $len_d_sph."<br>";
  echo $len_d_cyl."<br>";
  echo $len_d_axe."<br>";
  echo $len_g_sph."<br>";
  echo $len_g_cyl."<br>";
  echo $len_g_axe."<br>";
  echo $len_rayon."<br>";
  echo $len_diametre."<br>";
  exit();*/

  /*if ($lun_d_sph and $lun_d_cyl and $lun_d_axe and $lun_g_sph and $lun_g_cyl and $lun_g_axe and $lun_ep and $len_d_sph and $len_d_cyl and $len_d_axe and $len_g_sph and $len_g_cyl and $len_g_axe and $len_rayon and $len_diametre) {
    $q="INSERT INTO `customers`(`fullname`, `sexe`, `age`, `n_phone`, `lun_d_sph`, `lun_d_cyl`, `lun_d_axe`, `lun_g_sph`, `lun_g_cyl`, `lun_g_axe`, `lun_ep`, `len_d_sph`, `len_d_cyl`, `len_d_axe`, `len_g_sph`, `len_g_cyl`, `len_g_axe`, `len_rayon`, `len_diametre`) VALUES ('$fullname', '$sexe','$age', '$n_phone', '$lun_d_sph', '$lun_d_cyl', '$lun_d_axe', '$lun_g_sph', '$lun_g_cyl', '$lun_g_axe', '$lun_ep', '$len_d_sph', '$len_d_cyl', '$len_d_axe', '$len_g_sph', '$len_g_cyl', '$len_g_axe', '$len_rayon', '$len_diametre')";
    //echo $q;exit();
    $r=mysqli_query($dbc,$q);
    $msg="Inscription terminée avec succès";
  }elseif ($lun_d_sph and $lun_d_cyl and $lun_d_axe and $lun_g_sph and $lun_g_cyl and $lun_g_axe and $lun_ep and !$len_d_sph and !$len_d_cyl and !$len_d_axe and !$len_g_sph and !$len_g_cyl and !$len_g_axe and !$len_rayon and !$len_diametre) {
    $q="INSERT INTO `customers`(`fullname`, `sexe`, `age`, `n_phone`, `lun_d_sph`, `lun_d_cyl`, `lun_d_axe`, `lun_g_sph`, `lun_g_cyl`, `lun_g_axe`, `lun_ep`) VALUES ('$fullname', '$sexe', '$age', '$n_phone', '$lun_d_sph', '$lun_d_cyl', '$lun_d_axe', '$lun_g_sph', '$lun_g_cyl', '$lun_g_axe', '$lun_ep')";
    //echo $q;exit();
    $r=mysqli_query($dbc,$q);
    $msg="Inscription terminée avec succès";
  }elseif (!$lun_d_sph and !$lun_d_cyl and !$lun_d_axe and !$lun_g_sph and !$lun_g_cyl and !$lun_g_axe and !$lun_ep and $len_d_sph and $len_d_cyl and $len_d_axe and $len_g_sph and $len_g_cyl and $len_g_axe and $len_rayon and $len_diametre) {
    $q="INSERT INTO `customers`(`fullname`, `sexe`, `age`, `n_phone`, `len_d_sph`, `len_d_cyl`, `len_d_axe`, `len_g_sph`, `len_g_cyl`, `len_g_axe`, `len_rayon`, `len_diametre`) VALUES ('$fullname', '$sexe', '$age', '$n_phone','$len_d_sph', '$len_d_cyl', '$len_d_axe', '$len_g_sph', '$len_g_cyl', '$len_g_axe', '$len_rayon', '$len_diametre')";
    //echo $q;exit();
    $r=mysqli_query($dbc,$q);
    $msg="Inscription terminée avec succès";
  }else{
    $msg="Erreur lors du remplissage des champs";
  }*/
  $q="INSERT INTO `customers`(`fullname`, `sexe`, `age`, `n_phone`, `lun_d_sph`, `lun_d_cyl`, `lun_d_axe`, `lun_g_sph`, `lun_g_cyl`, `lun_g_axe`, `lun_ep`, `len_d_sph`, `len_d_cyl`, `len_d_axe`, `len_g_sph`, `len_g_cyl`, `len_g_axe`, `len_rayon`, `len_diametre`) VALUES ('$fullname', '$sexe','$age', '$n_phone', '$lun_d_sph', '$lun_d_cyl', '$lun_d_axe', '$lun_g_sph', '$lun_g_cyl', '$lun_g_axe', '$lun_ep', '$len_d_sph', '$len_d_cyl', '$len_d_axe', '$len_g_sph', '$len_g_cyl', '$len_g_axe', '$len_rayon', '$len_diametre')";
  $r=mysqli_query($dbc,$q);
  $msg="Inscription terminée avec succès";
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

  <title>Ajouter un client</title>

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
                <h1 class="h4 mb-4" style="color: #5f1411">Ajouter un client</h1>
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
              <form class="user" action="add_client.php" method="post">
                <div class="form-group">
                  <!-- <label>Nom complet</label> -->
                    <input type="text" class="form-control form-control-user" placeholder="Nom complet" name="fullname"  required>
                </div>
                <div class="form-group">
                  <label for="sel1">Sexe</label>
                  <select class="form-control" id="sel1" name="sexe" required>
                    <option></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
                <div class="form-group">
                  <!-- <label>Age</label> -->
                    <input type="number" class="form-control form-control-user" placeholder="Age" name="age"  required>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro de téléphone</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro de téléphone" name="n_phone"  required>
                </div>
                <label>Correction lunettes</label>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>OD</label>
                    <!-- <label>SPH Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_d_sph"  >
                    <!-- <label>CYL Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_d_cyl"  >
                    <!-- <label>Axe Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_d_axe"  >
                  </div>
                  <div class="col-sm-6">
                    <label>OG</label>
                    <!-- <label>SPH Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_g_sph"  >
                    <!-- <label>CYL Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_g_cyl"  >
                    <!-- <label>Axe Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="lun_g_axe"  >
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label>EP</label> -->
                  <input type="number" class="form-control form-control-user" value="0" name="lun_ep"  >
                </div>
                <label>Correction lentilles</label>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>OD</label>
                    <!-- <label>SPH Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_d_sph"  >
                    <!-- <label>CYL Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_d_cyl"  >
                    <!-- <label>Axe Deroit</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_d_axe"  >
                  </div>
                  <div class="col-sm-6">
                    <label>OG</label>
                    <!-- <label>SPH Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_g_sph"  >
                    <!-- <label>CYL Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_g_cyl"  >
                    <!-- <label>Axe Gauche</label> -->
                    <input type="number" class="form-control form-control-user" id="exampleInputPassword" value="0" name="len_g_axe"  >
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label>Rayon</label> -->
                  <input type="number" class="form-control form-control-user" value="0" name="len_rayon"  >
                </div>
                <div class="form-group">
                  <!-- <label>Diametre</label> -->
                  <input type="number" class="form-control form-control-user" value="0" name="len_diametre"  >
                </div>

                <input type="submit" name="submit" class="btn btn-user btn-block" value="Ajouter un client" style="background-color: #e8c7d0; color: #5f1411">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="g_clients.php" style="color: #5f1411">Gestion des client</a>
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
