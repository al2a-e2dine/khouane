<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  $fullname=$_POST['fullname'];
  $e_name=$_POST['e_name'];
  $email=$_POST['email'];
  $n_phone1=$_POST['n_phone1'];
  $n_phone2=$_POST['n_phone2'];
  $adr=$_POST['adr'];

  $q="SELECT * FROM `suppliers` WHERE `email`='$email'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num==0) {
    if ($n_phone2) {
      $q="INSERT INTO `suppliers`(`fullname`, `e_name`, `email`, `n_phone1`, `n_phone2`, `adr`) VALUES ('$fullname', '$e_name', '$email', '$n_phone1', '$n_phone2', '$adr')";
    }else{
      $q="INSERT INTO `suppliers`(`fullname`, `e_name`, `email`, `n_phone1`, `adr`) VALUES ('$fullname', '$e_name', '$email', '$n_phone1', '$adr')";
    }
      
      $r=mysqli_query($dbc,$q);
      $msg="Inscription terminée avec succès";
    
  }else{
    $msg="Cette adresse e-mail est déja utilisée !";
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

  <title>Ajouter un fournisseur</title>

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
                <h1 class="h4 mb-4" style="color: #5f1411">Ajouter un fournisseur</h1>
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
              <form class="user" action="add_f.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- <label>Nom complet</label> -->
                    <input type="text" class="form-control form-control-user" placeholder="Nom complet" name="fullname" required>
                  </div>
                  <div class="col-sm-6">
                    <!-- <label>Nom de l'entreprise</label> -->
                    <input type="text" class="form-control form-control-user" placeholder="Nom de l'entreprise" name="e_name" required>
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label>Adresse e-mail</label> -->
                  <input type="email" class="form-control form-control-user" placeholder="Adresse e-mail" name="email" required>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro de téléphone 1</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro de téléphone 1" name="n_phone1" required>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro de téléphone 2</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro de téléphone 2" name="n_phone2">
                </div>
                <div class="form-group">
                  <!-- <label>Adresse</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Adresse" name="adr" required>
                </div>
                
                <input type="submit" name="submit" class="btn btn-user btn-block" value="Ajouter un fournisseur" style="background-color: #e8c7d0; color: #5f1411">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="g_fournisseurs.php" style="color: #5f1411">Gestion des fournisseurs</a>
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
