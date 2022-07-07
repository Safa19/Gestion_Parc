<?php
require_once "../securite.php";
require_once "../config.inc.php";
$etat_reservation ="encours";
$info="";
if($_POST)
{
extract($_POST);
#vérifier si l'utilisateur a déjà des reservations en cours
$query = "select * from reservation where idUser = '$identite' and etat like 'encours'";  
$result = mysqli_query($link, $query);  
$count = mysqli_num_rows($result); 
if($count == 0)
{
	if($qtte>0){
	$sql = "insert into reservation (idUser,idEqui,dateR,jrPrevu,libE,typeE,qtteE,NameU,etat) 
	values ('$identite','$id_equip','$dt_reserv','$jr_prevu','$lib_equip','$type_equip','$qtte','$fullanme','$etat_reservation')";
	$link->query("SET NAMES 'utf8'");
	$res = $link->query($sql);
		if ($result == true)
		{
		$info =  "Equipement réservé avec succès.";
		mysqli_query($link, "update equipements set qtte = qtte-1 where id= '$id_equip'"); 
		}
		else 
			$info = "Erreur !!!";
	}
	else
	$info =  "Cet équipement n'est pas disponible en ce momoent";	
}
else
$info =  "Vous avez déjà des réservations en cours";
}
$_SESSION['info'] = $info;
//header('location:');   
header("refresh: 1; url = liste-materiels.php");
    
exit;
mysqli_close($link);
?>