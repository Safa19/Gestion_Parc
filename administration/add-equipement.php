<?php
require_once "../securite.php";
require_once "../config.inc.php";
require_once "../tab-equip.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$info="";
	$lib = trim($_POST["lib"]);
    $type = trim($_POST["type"]);
	$description = trim($_POST["description"]);
	$qtte = trim($_POST["qtte"]);
	
	if(empty($info)){
	$sql = "insert into equipements (lib_equip,type_equip,description,qtte) values ('$lib','$type','$description','$qtte')";
	$link->query("SET NAMES 'utf8'");
	$result = $link->query($sql);
	
	if ($result == true)
	{		
	$info =  "Equipemnt créé avec succès";
	
	}
	else
	{
	$info = "Equipement existant";
	}
	
	}
	$_SESSION['info'] = $info;
	header('location:g-equipements.php');

  
   
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
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
Nouveau équipement
</div>
<form class ="form-out" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

    <input type="text" placeholder="Libellé" name="lib" required>
    <select name="type" required>
	<option value="" selected>Type</option>
	<?php
	foreach($type_materiels as $x=>$y)
	echo "<option value = '$y'> $y </option>";
	?>
	</select>
  
    <textarea type="text" placeholder="Description" name="description" required></textarea>
    <label>Quantité</label>
    <input type="number" placeholder="Quantité" min = "0" max="50" name="qtte" required>
    <button type="submit" class="btn">Créer un équipement</button>
</form>
</div>
</div>
</body>
</html>