<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seuil Minimal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <br>
<div class="container" id="not_to_print">
					<div class="row">
                    <div class="col-md-6">
    					<a href="g_stock.php">
    					<button type="button" class="btn btn-block btn-dark" id="not_to_print">Retour</button>
    					</a>
    				</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-primary btn-block" onclick="myFunction();">Imprimer</button>
						</div>
					</div>
                </div>
<br>
<div class="container">
  <h2>les articles qui manquants</h2>
  <br>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Code</th>
        <th>Designation</th>
        <th>Qte en stock</th>
        <th>Prix d'achat</th>
        <th>Prix de vente</th>
        <th>Fournisseur</th>
      </tr>
    </thead>
    <tbody>
        <!-- 1 -->
    <?php
        $q="SELECT * FROM `glasses` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>glasses_<?= $row['id'] ?></td>
        <td><?= $row['designation'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
          <!-- 2 -->
    <?php
        $q="SELECT * FROM `glass` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>glass_<?= $row['id'] ?></td>
        <td>SPH=<?= $row['sph'] ?> - CYL=<?= $row['cyl'] ?> - ADD=<?= $row['ad'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
          <!-- 3 -->
    <?php
        $q="SELECT * FROM `lenses` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>lenses_<?= $row['id'] ?></td>
        <td>SPH=<?= $row['sph'] ?> - CYL=<?= $row['cyl'] ?> - AXE=<?= $row['axe'] ?> - Rayon=<?= $row['rayon'] ?> - Diamètre=<?= $row['diametre'] ?> - K1=<?= $row['k1'] ?> - K2=<?= $row['k2'] ?> - Sclerale=<?= $row['sclerale'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
          <!-- 4 -->
    <?php
        $q="SELECT * FROM `implants` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>implants_<?= $row['id'] ?></td>
        <td>Dioptrique=<?= $row['puissance'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
          <!-- 5 -->
    <?php
        $q="SELECT * FROM `produit_entre` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>produit_entre_<?= $row['id'] ?></td>
        <td><?= $row['article'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
          <!-- 6 -->
    <?php
        $q="SELECT * FROM `other` WHERE qte<=seuil_min and archived=0";
        $r=mysqli_query($dbc,$q);
        while ($row=mysqli_fetch_assoc($r)) {
        $f_id=$row['fournisseur_id'];
        $qf="SELECT * FROM `suppliers` where id='$f_id'";
        $rf=mysqli_query($dbc,$qf);
        $rowf=mysqli_fetch_assoc($rf);
        ?>
    <tr>
        <td>other_<?= $row['id'] ?></td>
        <td><?= $row['designation'] ?></td>
        <td><?= $row['seuil_min'] ?></td>
        <td><?= $row['prix_a'] ?></td>
        <td><?= $row['prix_v'] ?></td>
        <td><?= $rowf['fullname'] ?></td>
    </tr>
      <?php    
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>

<script>
function myFunction() {
	document.getElementById('not_to_print').style.visibility='hidden';
  window.print();
}
</script>
