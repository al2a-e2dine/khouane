<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['id'])) {
  $get_id=$_GET['id'];

  $q="SELECT * FROM `lenses` WHERE id='$get_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
}

if (isset($_POST['submit'])) {
  $get_id=$_POST['get_id'];

  $hy_s_r=$_POST['hy_s_r'];
  $type_de_len=$_POST['type_de_len'];

  $fournisseur_id=$_POST['fournisseur_id'];
  $qte=$_POST['qte'];
  $seuil_min=$_POST['seuil_min'];
  $prix_a=$_POST['prix_a'];
  $prix_v=$_POST['prix_v'];

    if ($type_de_len=="Sphérique") {
      $sph=$_POST['sph'];
      $rayon=$_POST['rayon'];
      $diametre=$_POST['diametre'];
      $q="UPDATE `lenses` SET `hy_s_r`='$hy_s_r',`type_de_len`='$type_de_len',`sph`='$sph',`rayon`='$rayon',`diametre`='$diametre',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }elseif ($type_de_len=="Torique") {
      $sph=$_POST['sph'];
      $rayon=$_POST['rayon'];
      $diametre=$_POST['diametre'];
      $cyl=$_POST['cyl'];
      $axe=$_POST['axe'];
      $q="UPDATE `lenses` SET `hy_s_r`='$hy_s_r',`type_de_len`='$type_de_len',`sph`='$sph',`cyl`='$cyl',`axe`='$axe',`rayon`='$rayon',`diametre`='$diametre',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }elseif ($type_de_len=="Rigide") {
      $sph=$_POST['sph'];
      $rayon=$_POST['rayon'];
      $diametre=$_POST['diametre'];
      $cyl=$_POST['cyl'];
      $axe=$_POST['axe'];
      $k1=$_POST['k1'];
      $k2=$_POST['k2'];
      $q="UPDATE `lenses` SET `hy_s_r`='$hy_s_r',`type_de_len`='$type_de_len',`sph`='$sph',`cyl`='$cyl',`axe`='$axe',`rayon`='$rayon',`diametre`='$diametre',`k1`='$k1',`k2`='$k2',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }else{
      $sclerale=$_POST['sclerale'];
      $q="UPDATE `lenses` SET `hy_s_r`='$hy_s_r',`type_de_len`='$type_de_len',`sclerale`='$sclerale',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }

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

  <title>Modifier lentilles</title>

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
                <h1 class="h4 mb-4" style="color: #5f1411">Modifier lentilles</h1>
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
              $q="SELECT * FROM `lenses` WHERE id='$get_id'";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              ?>
              <form class="user" action="update_lenses.php?id=<?= $get_id ?>" method="post">
                <div class="form-group">
                  <label for="sel1">x</label>
                  <select class="form-control" name="hy_s_r" id="hy_s_r" required>
                    <option value="<?= $row['hy_s_r'] ?>"><?= $row['hy_s_r'] ?></option>
                    <option value="Hydrogel">Hydrogel</option>
                    <option value="Silicone hydrogel">Silicone hydrogel</option>
                    <option value="Rigide">Rigide</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Type de lentilles</label>
                  <select class="form-control" id="type_de_len" name="type_de_len" required onchange="disable1();">
                    <option value="<?= $row['type_de_len'] ?>"><?= $row['type_de_len'] ?></option>
                    <option value="Sphérique" id="Sphérique">Sphérique</option>
                    <option value="Torique" id="Torique">Torique</option>
                    <option value="Rigide" id="Rigide">Rigide</option>
                    <option value="Scléral" id="Scléral">Scléral</option>
                  </select>
                </div>

                <div class="form-group">
                  <!-- <label>Puissance - SPH</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['sph'] ?>" name="sph" id="sph"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - CYL</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['cyl'] ?>" name="cyl" id="cyl"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - Axe</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['axe'] ?>" name="axe" id="axe"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - Rayon</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['rayon'] ?>" name="rayon" id="rayon"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - Diamètre</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['diametre'] ?>" name="diametre" id="diametre"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - K1</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['k1'] ?>" name="k1" id="k1"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - K2</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['k2'] ?>" name="k2" id="k2"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <!-- <label>Puissance - Sclerale</label> -->
                    <input type="text" class="form-control form-control-user" value="<?= $row['sclerale'] ?>" name="sclerale" id="sclerale"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <label for="sel1">Fournisseur</label>
                  <select class="form-control" id="sel1" name="fournisseur_id" required>
                    <?php
                    $f_id=$row['fournisseur_id'];
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

<script type="text/javascript">
  function disableAtt(atr) {
        let art = document.getElementById(atr);
        art.setAttribute('disabled', true);
        art.removeAttribute('required');
        art.value = "";
    }

    function enableAtt(atr) {
        let art = document.getElementById(atr);
        art.removeAttribute('disabled');
        art.setAttribute('required', true);
    }

  function disable1() {
        var type_de_len = document.getElementById('type_de_len');

        var sph = document.getElementById('sph');
        var cyl = document.getElementById('cyl');
        var axe = document.getElementById('axe');
        var rayon = document.getElementById('rayon');
        var diametre = document.getElementById('diametre');
        var k1 = document.getElementById('k1');
        var k2 = document.getElementById('k2');
        var sclerale = document.getElementById('sclerale');

        if (type_de_len.value == "Sphérique") {
              enableAtt('sph');
              disableAtt('cyl');
              disableAtt('axe');
              enableAtt('rayon');
              enableAtt('diametre');
              disableAtt('k1');
              disableAtt('k2');
              disableAtt('sclerale');
            }else if(type_de_len.value == "Torique"){
              enableAtt('sph');
              enableAtt('cyl');
              enableAtt('axe');
              enableAtt('rayon');
              enableAtt('diametre');
              disableAtt('k1');
              disableAtt('k2');
              disableAtt('sclerale');
            }else if(type_de_len.value == "Rigide"){
              enableAtt('sph');
              enableAtt('cyl');
              enableAtt('axe');
              enableAtt('rayon');
              enableAtt('diametre');
              enableAtt('k1');
              enableAtt('k2');
              disableAtt('sclerale');
            }else{
              disableAtt('sph');
              disableAtt('cyl');
              disableAtt('axe');
              disableAtt('rayon');
              disableAtt('diametre');
              disableAtt('k1');
              disableAtt('k2');
              enableAtt('sclerale');
            }
     
    }
</script>
