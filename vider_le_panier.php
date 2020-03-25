<?php
session_start();
require_once('connect.php');

  $q="UPDATE `cart` SET `archived`='1'";
  $r=mysqli_query($dbc,$q);
  //$msg="Le client a été supprimé";
  header('location:g_stock.php');

?>