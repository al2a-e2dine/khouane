<?php
include_once 'connect.php';

if (isset($_POST['submit'])) {
  $username=$_POST['username'];

  $password=$_POST['password'];
  $password=md5($password);
  //echo $password;exit();

  $q="SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
  //echo $q;exit();
  $r=mysqli_query($dbc,$q);
  $row=mysqli_fetch_assoc($r);
  //$uid=$row['id'];
  //echo $uid;exit();

  $num=mysqli_num_rows($r);

  if ($num==1) {
    // $q0="SELECT * FROM `users` WHERE id='$uid'";
    // $r0=mysqli_query($dbc,$q0);
    // $row0=mysqli_fetch_assoc($r0);
    session_start();
    $_SESSION['user_id']=$row['id'];
    $_SESSION['user_fullname']=$row['fullname'];
    $_SESSION['user_username']=$row['username'];
    $_SESSION['user_email']=$row['email'];
    $_SESSION['user_password']=$row['password'];
    $_SESSION['user_n_phone']=$row['n_phone'];
    $_SESSION['user_n_cni']=$row['n_cni'];
    $_SESSION['user_adr']=$row['adr'];
    $_SESSION['user_date']=$row['date'];
    header('location:index.php');
  }else{
    $msg="Nom d'utilisateur ou mot de passe incorrect !";
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

  <title>S'identifier</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #e8c7d0">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block" style="background-color: #ff86a7">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 mb-4" style="color: #5f1411">Bienvenue</h1>
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
                  <form class="user" action="login.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" placeholder="Entrer le nom d'utilisateur..." name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Mot de passe" name="password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-user btn-block" value="S'identifier" style="background-color: #e8c7d0;color: #5f1411">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php" style="color: #5f1411">Créer un compte!</a>
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
