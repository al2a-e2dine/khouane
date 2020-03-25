<?php
session_start();
require_once('connect.php');
if (isset($_GET['id'])) {
  $get_id=$_GET['id'];
  $q="DELETE FROM `cart` WHERE `id`='$get_id'";
  $r=mysqli_query($dbc,$q);
  //$msg="Le client a été supprimé";
  header('location:cart.php');
}else{
  //$msg="Il y a un problème, le client n'a pas été supprimé";
  header('location:cart.php');
}
?>