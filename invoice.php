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

if (isset($_GET['f'])) {
  $fact_id=$_GET['f'];

  $q="SELECT * FROM `invoice` WHERE id='$fact_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:g_fact.php');
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Facture</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
</head>
<body>
	<?php
	$q="SELECT * FROM `invoice` where id='$fact_id'";
	$r=mysqli_query($dbc,$q);
	$row=mysqli_fetch_assoc($r);
	$c_id=$row['client_id'];

	$q0="SELECT * FROM `customers` where id='$c_id'";
	$r0=mysqli_query($dbc,$q0);
	$row0=mysqli_fetch_assoc($r0);

	?>
<div class="container" id="to_print">
    <div class="row">
        <div class="col-xs-12">
        	<br>
    		<div class="invoice-title">
    			<h3>L.KHOUANE</h3>
    		</div>
    		<hr>
    		<p>OPTIQUE, ZONE 8, TEL:0553295527</p>
    		<p>BOUZGAOU KADDOUR, ZONE 10</p>
    		<p>MASCARA, MASCARA 29000</p>
    		<p>ALGERIE</p>
    		<hr>
    		<p><b>Vendu à:</b></p>
    		<p><?= $row0['fullname'] ?></p>
    		<p><?= $row0['sexe'] ?>, <?= $row0['age'] ?> ans</p>

    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Facture N° <?= $row['id'] ?> | Date : <?= $row['date'] ?></strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
			                    <tr>
			                      <th>Code</th>
			                      <th>Qte</th>
			                      <th>Prix unitaire</th>
			                      <th>Prix</th>
			                    </tr>
			                  </thead>
    						<tbody>
			                    <?php
			                    $sum=0;
			                    $q="SELECT * FROM `cart` where fact_id='$fact_id'";
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
			                    </tr>
			                    <?php
			                    }
			                  }
			                    ?>
			                  </tbody>
    					</table>
    				</div>

<h1 align="right">Total : <?= $sum ?> DA</h1>
    			</div>

    			

    		</div>
    		
    	</div>
    </div>
</div>
				<div class="container" id="not_to_print">
					<div class="row">
						<div class="col-md-6">
							<a href="save_fact.php?sum=<?= $sum ?>&f=<?= $fact_id ?>">
							<button type="button" class="btn btn-success btn-block">Enregistrer</button>
							</a>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-primary btn-block" onclick="myFunction();">Imprimer la facture</button>
						</div>
					</div>
				</div>
				<br>
                  

</body>
</html>

<script>
function myFunction() {
	document.getElementById('not_to_print').style.visibility='hidden';
  window.print();
}
</script>