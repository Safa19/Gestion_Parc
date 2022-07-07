<?php
require_once "../securite.php";
require_once "../config.inc.php";
require_once "../tab-equip.php";
if($_GET)
{
	extract($_GET);
	$sql = "select * from equipements where id = '$id1'";
	$link->query("SET NAMES 'utf8'");
	$result = $link->query($sql);
	$data = $result->fetch_assoc();

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
Mise à jour d'un équipement
</div>
<form class="form-out" action="action-update-equipement.php" method="post">

	<input type="hidden" value="<?php echo $data['id']?>" name="id" required>
    <label>Libellé</label>
    <input type="text" value="<?php echo $data['lib_equip']?>" name="lib" required>
	<label>Type</label>
    <select name="type" required>
	<option value="">All type</option>
	<?php
	foreach($type_materiels as $x=>$y)
	{
	?>
	<option value="<?php echo $y ?>"
    <?php if($id2==$y) echo "selected" ?>>
    <?php echo $y ;
	//fin foreach
	}
	?> 
                                        
    </option>
	</select>
    <label>Description</label>
    <textarea name="description" required><?php echo $data['description']?></textarea>
    <label>Quantité</label>
    <input type="number" value="<?php echo $data['qtte']?>" name="qtte" min = "0" max="50" required>

    <button type="submit" class="btn">Modifier cet équipement</button>
</form>
</div>
</div>
</body>
</html>

<?php
}
mysqli_close($link);
?>