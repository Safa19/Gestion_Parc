<?php
require_once "../securite.php";
require_once "../config.inc.php";
$name = $_SESSION['user']['name'];
$username = $_SESSION['user']['username'];
$search=isset($_GET['search'])?$_GET['search']:"";
$page=isset($_GET['page'])?$_GET['page']:1;
$results_per_page = 5;  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  
$sql = "select * from utilisateurs where role != 'administrateur' and (name like '%$search%'
or email like '%$search%' or username like '%$search%') LIMIT " . $page_first_result . ',' . $results_per_page;
$link->query("SET NAMES 'utf8'");
$res = $link->query($sql);

$query = "select * from utilisateurs where role != 'administrateur' and (name like '%$search%'
or email like '%$search%' or username like '%$search%')";  
$result = mysqli_query($link, $query);  
$row_count = mysqli_num_rows($result);  
$number_of_page = ceil ($row_count / $results_per_page);  	
 
 
	
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
    <title>Tableau de bord</title>
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
Liste des utilisateurs
</div>
<div class="current">
<div class="search">
<form action="" method="">
<input type="text" placeholder="search" name="search">
<button type="submit" class="btn">Chercher</button>
</form>
</div>
</div>
<div class="mytable">
<?php if (!empty($info)) { ?>		
<div class="alert">
<?php echo $info; ?>
</div>
<?php 
} 

?>
<table>
	<tr>
		<th>N°</th>
		<th>Name</th>
		<th>Email</th>
		<th>Username</th>
		<th>Rôle</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	<?php
	if ($row_count>0)
    {
	while ($rows = $res->fetch_assoc()){ 
	?>   
	<tr>
		<td><?php echo $rows['id']; ?></td>				
		<td><?php echo $rows['name']; ?></td>
		<td><?php echo $rows['email']; ?></td> 				
		<td><?php echo $rows['username']; ?></td> 		
		<td><?php echo $rows['role']; ?></td> 
		<td><?php echo $rows['status']; ?></td> 
		<td>
		<a href="view-user.php?id=<?php echo $rows['id']; ?>" title="Consulter">
		<i class="large material-icons">info_outline</i></a>
		<a onclick="return confirm('Etes-vous sûr de vouloir activer ce compte utilisateur')" 
		href="active-user.php?id=<?php echo $rows['id']; ?>
		&& status=<?php echo $rows['status']; ?> " title="Désactiver">
		<i class="large material-icons">storage</i></a>
		</td>
		
	</tr>
    <?php 
	}
	}
	else
		echo "<tr><td colspan='9'><h3>Pas d'enregistrmemts en cours</h3></td></tr>";

	?> 
	
</table>
<?php
 //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a class= pagination href = "g-utilisateurs.php?page=' . $page . '">page ' .$page. ' </a>';  
    }  
?>
</div>
</div>
</div>
</body>
</html>

