<?php
session_start();
require_once('connect.php');

if (isset($_GET['type']) and isset($_GET['id'])) {
  $get_id=$_GET['id'];

  if ($_GET['type']==1) {
    $q="UPDATE `glasses` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }elseif ($_GET['type']==2) {
    $q="UPDATE `glass` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }elseif ($_GET['type']==3) {
    $q="UPDATE `lenses` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }elseif ($_GET['type']==4) {
    $q="UPDATE `implants` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }elseif ($_GET['type']==5) {
    $q="UPDATE `produit_entre` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }elseif ($_GET['type']==6) {
    $q="UPDATE `other` SET `archived`='1' WHERE `id`='$get_id'";
    //echo $q;exit();
  }
  
    $r=mysqli_query($dbc,$q);
    header('location:g_stock.php');

}else{
	header('location:g_stock.php');
}
?>