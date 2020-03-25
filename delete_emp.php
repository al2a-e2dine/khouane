<?php
session_start();
require_once('connect.php');
if (isset($_GET['id'])) {
	$get_id=$_GET['id'];
	$q="UPDATE `users` SET `archived`='1' WHERE `id`='$get_id'";
	$r=mysqli_query($dbc,$q);
	//$msg="L'employé a été supprimé";
	header('location:g_employes.php');
}else{
	//$msg="Il y a un problème, l'employé n'a pas été supprimé";
	header('location:g_employes.php');
}
?>