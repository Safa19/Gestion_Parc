<?php
require_once "../securite.php";
require_once "../config.inc.php";

$request = "update equipements set dispo = 'Indisponible' where qtte=0";
$link->query($request);

$search=isset($_GET['search'])?$_GET['search']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$results_per_page = 5;   
$page_first_result = ($page-1) * $results_per_page;  
$sql = "select * from equipements where qtte like '%$search%' or lib_equip like '%$search%'
or type_equip like '%$search%' or description like '%$search%' or dispo like '%$search%'
LIMIT " . $page_first_result . ',' . $results_per_page;
$link->query("SET NAMES 'utf8'");
$res = $link->query($sql);
$query = "select * from equipements where qtte like '%$search%' or lib_equip like '%$search%'
or type_equip like '%$search%' or description like '%$search%' or dispo like '%$search%'";  
$result = mysqli_query($link, $query);  
$row_count = mysqli_num_rows($result);  
$number_of_page = ceil ($row_count / $results_per_page);  	




/*afficher les messages */
if(isset($_SESSION['info']))
$info = $_SESSION['info'];
else
$info="";
unset($_SESSION['info']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace utilisateur</title>
	 <link rel="stylesheet" href="../css/icon.css">
    <link rel="stylesheet" href="../css/font-style.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>


<div class="row">
<div class="cols-25">
<?php include_once "sidbar-user.php"; ?>
</div>
<div class="cols-75">
<div class="entete">
Réservation matériel
</div>
<div class="current">
<div class="search">
<form action="" method="">
<input type="text" placeholder="Mot Clé ..." name="search">
<button type="submit" class="btn">Chercher</button>
</form>
</div>
</div>
<div class="mytable">
<?php if (!empty($info)) { ?>		
<div class="alert">
<?php echo $info; ?>
</div>
<?php } ?>
<table>
	<tr>
		<th>N°</th>
		<th>Libellé</th>
		<th>Type</th>
		<th>Description</th>
		<th>Quantité</th>
		<th>Disponibilite</th>
		<th class="text-right">Actions</th>
	</tr>
	<?php
	if ($row_count>0)
    {
	while ($rows = $res->fetch_assoc()){ 
	?>   
	<tr>
		<td width="6%"><?php echo $rows['id']; ?></td>				
		<td width="27%"><?php echo $rows['lib_equip']; ?></td>
		<td width="10%"><?php echo $rows['type_equip']; ?></td> 				
		<td width="27%"><?php echo $rows['description']; ?></td> 		
		<td width="10%"><?php echo $rows['qtte']; ?></td> 
		<td width="10%"><?php echo $rows['dispo']; ?>
	    </td> 
		<td width="10%" class="text-right">
		<a href="view-equipement.php?id=<?php echo $rows['id']; ?>" title="Consulter">
		<i class="large material-icons">info_outline</i></a>
		<a href="reserver.php?value1=<?php echo $rows['id']; ?> && value2=<?php echo $rows['lib_equip'] ?>
		&& value3=<?php echo $rows['type_equip'] ?>&& value4=<?php echo $rows['qtte'] ?>" title="Réserver">
		<i class="large material-icons">computer</i></a>
		</td>
	</tr>
    <?php 
	}
	}
	else
	echo "<tr><td colspan='9'><h3>Pas d'enregistrements en cours</h3></td></tr>";
	?> 
	
</table>
<?php
for($page = 1; $page<= $number_of_page; $page++) 
{  
    echo '<a class= pagination href = "liste-materiels.php?page=' . $page . '">page ' .$page. ' </a>';  
}  
?>
</div>
</div>
</div>
</body>
</html>

