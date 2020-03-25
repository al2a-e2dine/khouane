<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

if (isset($_GET['d']) and isset($_GET['s']) and isset($_GET['g'])) {
	$date=$_GET['d'];
  $sum=$_GET['s'];
  $sum_g=$_GET['g'];
}else{
  header('location:g_caisse.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recette</title>
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
    		<h4>Le : <?= $date ?></h4>

            <?php 
                $capital=(($sum-$sum_g)*100)/$sum;
                //echo $capital."<br>";
                $revenu_net=($sum_g*100)/$sum;
                //echo $revenu_net."<br>";exit();
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
    		<div class="container">
    			<div class="row">
    				<div class="col-md-6">
    					<h3>Revenu</h3>
    					<h2><?= $sum ?> DA</h2>
    				</div>
    				<div class="col-md-6">
    					<h3>Revenu net</h3>
    					<h2><?= $sum_g ?> DA</h2>
    				</div>
    			</div>

    			<div class="row">
    				<div class="col-md-6">
    					<a href="g_caisse.php">
    					<button type="button" class="btn btn-block btn-dark" id="not_to_print">Retour</button>
    					</a>
    				</div>
    				<div class="col-md-6">
    					<button type="button" class="btn btn-block" style="background-color: #e8c7d0; color: #5f1411" onclick="myFunction();" id="not_to_print">Imprimer la recette</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
                
                  

</body>
</html>

<script>
function myFunction() {
	document.getElementById('not_to_print').style.visibility='hidden';
  window.print();
}
</script>