<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['id'])) {
  $get_id=$_GET['id'];

  $q="SELECT * FROM `glass` WHERE id='$get_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
}

if (isset($_POST['submit'])) {
  $org_or_min=$_POST['org_or_min'];
  $indice=$_POST['indice'];
  $type=$_POST['type'];

  $sph=$_POST['sph'];
  
  $type_de_trait=$_POST['type_de_trait'];
  $fournisseur_id=$_POST['fournisseur_id'];
  $qte=$_POST['qte'];
  $seuil_min=$_POST['seuil_min'];
  $prix_a=$_POST['prix_a'];
  $prix_v=$_POST['prix_v'];

  $get_id=$_POST['get_id'];

    if ($type=="Sphérique") {
      $q="UPDATE `glass` SET `org_or_min`='$org_or_min',`indice`='$indice',`type`='$type',`sph`='$sph',`type_de_trait`='$type_de_trait',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }elseif ($type=="Torique") {
      $cyl=$_POST['cyl'];
      $q="UPDATE `glass` SET `org_or_min`='$org_or_min',`indice`='$indice',`type`='$type',`sph`='$sph',`cyl`='$cyl',`type_de_trait`='$type_de_trait',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
    }else{
      $cyl=$_POST['cyl'];
      $ad=$_POST['ad'];
      $q="UPDATE `glass` SET `org_or_min`='$org_or_min',`indice`='$indice',`type`='$type',`sph`='$sph',`cyl`='$cyl',`ad`='$ad',`type_de_trait`='$type_de_trait',`fournisseur_id`='$fournisseur_id',`qte`='$qte',`seuil_min`='$seuil_min',`prix_a`='$prix_a',`prix_v`='$prix_v' WHERE `id`='$get_id'";
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

  <title>Modifier verres</title>

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
                <h1 class="h4 mb-4" style="color: #5f1411">Modifier verres</h1>
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
              $q="SELECT * FROM `glass` WHERE id='$get_id'";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              ?>
              <form class="user" action="update_glass.php?id=<?= $get_id ?>" method="post">
                <div class="form-group">
                  <label for="sel1">Choisissez le type de verre</label>
                  <select class="form-control" name="org_or_min" required>
                    <option value="<?= $row['org_or_min'] ?>"><?= $row['org_or_min'] ?></option>
                    <option value="Organique">Organique</option>
                    <option value="Torique">Mineral</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Indice</label>
                  <select class="form-control" id="sel1" name="indice" required>
                    <option value="<?= $row['indice'] ?>"><?= $row['indice'] ?></option>
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="1">2</option>
                    <option value="1.5">2.5</option>
                    <option value="1">3</option>
                    <option value="1.5">4.5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Type de verre</label>
                  <select class="form-control" id="type" name="type" required onchange="disable1();">
                    <option value="<?= $row['type'] ?>"><?= $row['type'] ?></option>
                    <option value="Sphérique" id="Sphérique">Sphérique</option>
                    <option value="Torique" id="Torique">Torique</option>
                    <option value="Progressif" id="Progressif">Progressif</option>
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
                  <!-- <label>Puissance - AD</label> -->
                    <input type="number" class="form-control form-control-user" value="<?= $row['ad'] ?>" name="ad" id="ad"  required onchange="disable1();">
                </div>
                <div class="form-group">
                  <label for="sel1">Type de traitement</label>
                  <select class="form-control" id="sel1" name="type_de_trait" required>
                    <option value="<?= $row['type_de_trait'] ?>"><?= $row['type_de_trait'] ?></option>>
                    <option value="Aucun">Aucun</option>
                    <option value="Durci">Durci</option>
                    <option value="Anti reflet">Anti reflet</option>
                    <option value="Anti lumière bleue">Anti lumière bleue</option>
                    <option value="Transition">Transition</option>
                    <option value="Transition HMC">Transition HMC</option>
                    <option value="Solère">Solère</option>
                    <option value="Solère Anti reflet">Solère Anti reflet</option>
                  </select>
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
        var type = document.getElementById('type');

        var sph = document.getElementById('sph');
        var cyl = document.getElementById('cyl');
        var ad = document.getElementById('ad');

        if (type.value == "Sphérique") {
            enableAtt('sph');
            disableAtt('cyl');
            disableAtt('ad');
        } else if (type.value == "Torique") {
            enableAtt('sph');
            enableAtt('cyl');
            disableAtt('ad');
        } else {
            enableAtt('sph');
            enableAtt('cyl');
            enableAtt('ad');
        }
    }
</script>