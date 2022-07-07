<?php
require_once "../securite.php";
require_once "../config.inc.php";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$info="";
	$id = trim($_POST["id"]);
	
	$lib = trim($_POST["lib"]);
    $type = trim($_POST["type"]);
	$description = trim($_POST["description"]);
	$qtte = trim($_POST["qtte"]);
	
	if(empty($info)){
	$sql = "update equipements 
	set lib_equip = '$lib', type_equip = '$type', description = '$description', qtte = '$qtte' where id='$id'";
	
	$link->query("SET NAMES 'utf8'");
	
	$result = $link->query($sql);
	
	if ($result == true)
	{		
	$info =  "Equipement mit à jour avec succès";
	
	}
	else
	{
	$info = "Equipement existant";
	}
	
	}
	$_SESSION['info'] = $info;

header("refresh: 1; url = g-equipements.php");
  
   
}
mysqli_close($link);
?>