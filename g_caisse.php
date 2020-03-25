<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_POST['submit'])) {
  $date=$_POST['date'];
}

if (isset($_POST['submit1'])) {
  $m=$_POST['m'];
  $y=$_POST['y'];
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

  <title>Gestion de caisse</title>

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
          <h1 class="h3 mb-2 text-gray-800">Gestion de caisse</h1>
          <p class="mb-4">kach manektbou hna ...</p>
                

                <div class="container-fluid">
                	<form class="user" action="g_caisse.php" method="post">
                		<div class="form-group row">
		                  <div class="col-sm-6 mb-3 mb-sm-0">
		                    <!-- <label>Nom complet</label> -->
		                    <?php
		                    if (isset($date)) {
		                    ?>
		                    <input class="form-control" type="date" value="<?= $date ?>" name="date" required>
		                    <?php
		                    }else{
		                    ?>
		                    <input class="form-control" type="date" value="<?= date("Y-m-d") ?>" name="date" required>
		                    <?php
		                    }
		                    ?>
		                    
		                  </div>
		                  <div class="col-sm-6">
		                    <input type="submit" name="submit" class="btn btn-user btn-block" value="Consultation" style="background-color: #e8c7d0; color: #5f1411">
		                  </div>
		                </div>
		              </form>
		          </div>
		          <br>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #5f1411">Nos ventes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Qte</th>
                      <th>Prix unitaire</th>
                      <th>Prix total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sum=0;
                    $sum_g=0;
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='1' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `glasses` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>glasses_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                    <!-- 2 -->
                    <?php
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='2' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `glass` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>glass_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                    <!-- 3 -->
                    <?php
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='3' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `lenses` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>lenses_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                    <!-- 4 -->
                    <?php
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='4' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `implants` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>implants_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                    <!-- 5 -->
                    <?php
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='5' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `produit_entre` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>produit_entre_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                    <!-- 6 -->
                    <?php
                    if (isset($date)) {
                    $q="SELECT * FROM `cart` WHERE `art_type`='6' and `date`='$date'";
                    //echo $q;exit();
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    	$art_id=$row['art_id'];
                    	$q1="SELECT * FROM `other` WHERE `id`='$art_id'";
                    	//echo $q1;exit();
                    	$r1=mysqli_query($dbc,$q1);
                    	$row1=mysqli_fetch_assoc($r1);
                    ?>
                    <tr>
                      <td>other_<?= $row1['id'] ?></td>
                      <td><?= $row['qte'] ?></td>
                      <td><?= $row1['prix_v'] ?> DA</td>
                      <?php
                      $prix=$row['qte']*$row1['prix_v'];
                      $g=$row['qte']*$row1['net_profit'];
                      $sum=$sum+$prix;
                      $sum_g=$sum_g+$g;
                      ?>
                      <td><?= $prix ?></td>
                    </tr>
                    <?php
                    }
                }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php 
          if (isset($date)) {
          ?>
			<div class="container">
                	<div class="row">
                		<div class="col-md-6">
                			<div class="card bg-dark text-white">
							    <div class="card-body">
							    	<div class="container">
               						<div class="row">
                					<div class="col-md-6">
                						<h3>Revenu</h3>
							    		<h4>Le : <?= $date ?></h4>
                					</div>
                					<div class="col-md-6">
                						<br>
                						<h2><?= $sum ?> DA</h2>
                					</div>
                					</div>
                					</div>
								</div>
							  </div>
                		</div>

                		<div class="col-md-6">
                			<div class="card bg-success text-white">
							    <div class="card-body">
							    <div class="container">
               						<div class="row">
                					<div class="col-md-6">
                						<h3>Revenu net</h3>
							    		<h4>Le : <?= $date ?></h4>
                					</div>
                					<div class="col-md-6">
                						<br>
                						<h2><?= $sum_g ?> DA</h2>
                					</div>
                					</div>
                					</div>
								</div>
							  </div>
                		</div>
                	</div>
                </div>
                <br>
                <?php 
                $capital=(($sum-$sum_g)*100)/$sum;
                $revenu_net=($sum_g*100)/$sum;
                 ?>
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
            echo "['capital', ".$capital."],";
            echo "['revenu net', ".$revenu_net."]";
           ?> 
        ]);

        var options = {
          title: 'Statistiques'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
                <div id="piechart"></div>
                <br>
                <a href="recette.php?d=<?= $date ?>&s=<?= $sum ?>&g=<?= $sum_g ?>">
                <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Imprimer la recette</button>
                </a>
                <?php
		          }
		           ?>
               <!-- month -->
               <br>
               <div class="container-fluid">
                  <form class="user" action="g_caisse.php" method="post">
                    <div class="form-group row">
                      <div class="form-group col-md-4">
                        <select class="form-control" name="m">
                          <option></option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <select class="form-control" name="y">
                        <option></option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                          <option value="2026">2026</option>
                          <option value="2027">2027</option>
                          <option value="2028">2028</option>
                          <option value="2029">2029</option>
                          <option value="2030">2030</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <input type="submit" name="submit1" class="btn btn-user btn-block" value="Consultation" style="background-color: #e8c7d0; color: #5f1411">
                      </div>
                    </div>
                  </form>
              </div>
              <?php 
              if (isset($m) and isset($y)) {
                $sum1=0;
                $sum_g1=0;
                $q="SELECT * FROM `cart` WHERE `art_type`='1' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `glasses` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 2
                $q="SELECT * FROM `cart` WHERE `art_type`='2' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `glass` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 3
                $q="SELECT * FROM `cart` WHERE `art_type`='3' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `lenses` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 4
                $q="SELECT * FROM `cart` WHERE `art_type`='4' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `implants` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 5
                $q="SELECT * FROM `cart` WHERE `art_type`='5' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `produit_entre` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 6
                $q="SELECT * FROM `cart` WHERE `art_type`='6' and `date` like '$y-$m%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `other` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                ?>

               <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card bg-dark text-white">
                  <div class="card-body">
                    <div class="container">
                          <div class="row">
                          <div class="col-md-6">
                            <h3>Revenu</h3>
                      <h4>Le : <?= $m."-".$y ?></h4>
                          </div>
                          <div class="col-md-6">
                            <br>
                            <h2><?= $sum1 ?> DA</h2>
                          </div>
                          </div>
                          </div>
                </div>
                </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card bg-success text-white">
                  <div class="card-body">
                  <div class="container">
                          <div class="row">
                          <div class="col-md-6">
                            <h3>Revenu net</h3>
                      <h4>Le : <?= $m."-".$y ?></h4>
                          </div>
                          <div class="col-md-6">
                            <br>
                            <h2><?= $sum_g1 ?> DA</h2>
                          </div>
                          </div>
                          </div>
                </div>
                </div>
                    </div>
                  </div>
                </div>
                <?php
              }else if (!isset($m) and isset($y)) {
                $sum1=0;
                $sum_g1=0;
                $q="SELECT * FROM `cart` WHERE `art_type`='1' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `glasses` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 2
                $q="SELECT * FROM `cart` WHERE `art_type`='2' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `glass` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 3
                $q="SELECT * FROM `cart` WHERE `art_type`='3' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `lenses` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 4
                $q="SELECT * FROM `cart` WHERE `art_type`='4' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `implants` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 5
                $q="SELECT * FROM `cart` WHERE `art_type`='5' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `produit_entre` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                // 6
                $q="SELECT * FROM `cart` WHERE `art_type`='6' and `date` like '$y%'";
                $r=mysqli_query($dbc,$q);
                while ($row=mysqli_fetch_assoc($r)) {
                  $art_id=$row['art_id'];
                  $qte=$row['qte'];

                  $q1="SELECT * FROM `other` WHERE `id`='$art_id'";
                  $r1=mysqli_query($dbc,$q1);
                  $row1=mysqli_fetch_assoc($r1);

                  $prix_v=$row1['prix_v'];
                  $net_profit=$row1['net_profit'];

                  $revenu=$prix_v*$qte;
                  $revenu_net=$net_profit*$qte;

                  $sum1=$sum1+$revenu;
                  $sum_g1=$sum_g1+$revenu_net;
                }
                ?>

               <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card bg-dark text-white">
                  <div class="card-body">
                    <div class="container">
                          <div class="row">
                          <div class="col-md-6">
                            <h3>Revenu</h3>
                      <h4>Le : <?= $y ?></h4>
                          </div>
                          <div class="col-md-6">
                            <br>
                            <h2><?= $sum1 ?> DA</h2>
                          </div>
                          </div>
                          </div>
                </div>
                </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card bg-success text-white">
                  <div class="card-body">
                  <div class="container">
                          <div class="row">
                          <div class="col-md-6">
                            <h3>Revenu net</h3>
                      <h4>Le : <?= $y ?></h4>
                          </div>
                          <div class="col-md-6">
                            <br>
                            <h2><?= $sum_g1 ?> DA</h2>
                          </div>
                          </div>
                          </div>
                </div>
                </div>
                    </div>
                  </div>
                </div>
                <?php
              }
               ?>
                <br>
                <?php
                if (isset($sum1) and isset($sum_g1) and $sum1!=0) {
                $capital=(($sum1-$sum_g1)*100)/$sum1;
                $revenu_net=($sum_g1*100)/$sum1;
                 ?>
                 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
            echo "['capital', ".$capital."],";
            echo "['revenu net', ".$revenu_net."]";
           ?> 
        ]);

        var options = {
          title: 'Statistiques'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
                <div id="piechart"></div>
                <br>
                <?php
                if(isset($m)){
                  ?>
                  <a href="recette.php?d=<?= $y."-".$m ?>&s=<?= $sum1 ?>&g=<?= $sum_g1 ?>">
                  <?php
                }else{
                  ?>
                  <a href="recette.php?d=<?= $y ?>&s=<?= $sum1 ?>&g=<?= $sum_g1 ?>">
                  <?php
                }
                ?>
                
                <button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411">Imprimer la recette</button>
                </a>
                <?php 
              }
                 ?>
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
