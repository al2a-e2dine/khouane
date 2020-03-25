<?php
include_once 'connect.php';

if (isset($_GET['sum']) and isset($_GET['f'])) {
  $sum=$_GET['sum'];
  $fact_id=$_GET['f'];

  $q="UPDATE `invoice` SET `total`='$sum' WHERE `id`='$fact_id'";
  $r=mysqli_query($dbc,$q);
  header('location:invoice.php?f='.$fact_id);
}

?>