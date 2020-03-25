<?php
session_start();
require_once('connect.php');
if (isset($_GET['id'])) {
	$get_id=$_GET['id'];
	$q="UPDATE `customers` SET `archived`='1' WHERE `id`='$get_id'";
	$r=mysqli_query($dbc,$q);
	//$msg="Le client a été supprimé";
	header('location:g_clients.php');
}else{
	//$msg="Il y a un problème, le client n'a pas été supprimé";
	header('location:g_clients.php');
}
?>