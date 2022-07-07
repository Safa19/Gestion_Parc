<?php
require_once "../securite.php";
require_once "../config.inc.php";
$info="";
if($_GET)
{
	extract($_GET);
	$sql = "delete from equipements where id = '$id'";
	$result = $link->query($sql);
	if ($result == true)
	$info =  "Equipemnt supprimé avec succès";
	else
	$info = "Cet équipement est lié à une réservation";
}
$_SESSION['info'] = $info;
header('location:g-equipements.php'); 
mysqli_close($link);
?>