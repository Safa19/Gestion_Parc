<?php
require_once "../securite.php";
require_once "../config.inc.php";
$id = $_SESSION['user']['id'];
$search=isset($_GET['search'])?$_GET['search']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$results_per_page = 5;   
$page_first_result = ($page-1) * $results_per_page;  
$sql = "select * from reservation where (dateR like '%$search%'
or jrPrevu like '%$search%' or libE like '%$search%')
LIMIT " . $page_first_result . ',' . $results_per_page;
$link->query("SET NAMES 'utf8'");
$res = $link->query($sql);
$query = "select * from reservation where (dateR like '%$search%'
or jrPrevu like '%$search%' or libE like '%$search%')";  
$result = mysqli_query($link, $query);  
$row_count = mysqli_num_rows($result);  
$number_of_page = ceil ($row_count / $results_per_page);  	

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
<?php include_once "sidbar-admin.php"; ?>
</div>
<div class="cols-75">
<div class="entete">
Toutes les réservations
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
		<th>Nom et prénom</th>
		<th>Date de réservation</th>
		<th>Jour prévu</th>
		<th>Libellé équipement</th>
		<th>Type</th>
		<th>Action</th>
	</tr>
	<?php
	if ($row_count>0)
    {
	while ($rows = $res->fetch_assoc()){ 
	?>   
	<tr>
		<td><?php echo $rows['num']; ?></td>
		<td><?php echo $rows['NameU']; ?></td>		
		<td><?php echo $rows['dateR']; ?></td>
		<td><?php echo $rows['jrPrevu']; ?></td> 				
		<td><?php echo $rows['libE']; ?></td> 		
		<td><?php echo $rows['typeE']; ?></td> 
		
	    </td> 
		<td>
		<a href="view-reservation.php?id=<?php echo $rows['num']; ?>" title="Consulter">
		<i class="large material-icons">info_outline</i></a>
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
    echo '<a class= pagination href = "all-reservations.php?page=' . $page . '">page ' .$page. ' </a>';  
}  
?>
</div>
</div>
</div>
</body>
</html>

