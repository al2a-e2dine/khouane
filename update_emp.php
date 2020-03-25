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

if (isset($_POST['submit'])) {
  $fullname=$_POST['fullname'];

  $username0=$_POST['username'];
  $username = str_replace(' ', '', $username0);

  $email=$_POST['email'];
  $n_phone=$_POST['n_phone'];
  $n_cni=$_POST['n_cni'];
  $adr=$_POST['adr'];
  $get_id=$_POST['get_id'];

  $q="SELECT * FROM `users` WHERE `email`='$email'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num<=1) {
    $q="SELECT * FROM `users` WHERE `username`='$username'";
    $r=mysqli_query($dbc,$q);
    $num=mysqli_num_rows($r);
    //echo $num; exit();
    if ($num<=1) {
      
      $q="UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`n_phone`='$n_phone',`n_cni`='$n_cni',`adr`='$adr' WHERE `id`=$get_id";
      $r=mysqli_query($dbc,$q);
      $msg="Modification terminée avec succès";
    
    }else{
    $msg="Ce nom d'utilisateur est déja utilisé !";
    }
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

  <title>Modifier un employé</title>

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
                <h1 class="h4 text-gray-900 mb-4" style="color: #5f1411">Modifier un employé</h1>
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
              $q="SELECT * FROM `users` WHERE id='$get_id'";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              ?>
              <form class="user" action="update_emp.php?id=<?= $get_id ?>" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nom complet</label>
                    <input type="text" class="form-control form-control-user" value="<?= $row['fullname'] ?>" name="fullname">
                  </div>
                  <div class="col-sm-6">
                    <label>Nom d'utilisateur</label>
                    <input type="text" class="form-control form-control-user" value="<?= $row['username'] ?>" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label>Adresse e-mail</label>
                  <input type="email" class="form-control form-control-user" value="<?= $row['email'] ?>" name="email">
                </div>
                <div class="form-group">
                  <label>Numéro de téléphone</label>
                  <input type="number" class="form-control form-control-user" value="<?= $row['n_phone'] ?>" name="n_phone">
                </div>
                <div class="form-group">
                  <label>Numéro CNI</label>
                  <input type="number" class="form-control form-control-user" value="<?= $row['n_cni'] ?>" name="n_cni">
                </div>
                <div class="form-group">
                  <label>Adresse</label>
                  <input type="text" class="form-control form-control-user" value="<?= $row['adr'] ?>" name="adr">
                </div>
                <input type="hidden" name="get_id" value="<?= $get_id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block" value="Mise a jour" style="background-color: #e8c7d0; color: #5f1411">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php?id=<?= $row['id'] ?>" style="color: #5f1411">Modifier le mot de pass</a>
              </div>
              <div class="text-center">
                <a class="small" href="g_employes.php" style="color: #5f1411">Gestion des employés</a>
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
