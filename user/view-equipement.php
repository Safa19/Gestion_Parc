<?php
require_once "../securite.php";
require_once "../config.inc.php";
if($_GET)
{
	
	extract($_GET);
	$sql = "select * from equipements where id = '$id'";
	$link->query("SET NAMES 'utf8'");
	$result = $link->query($sql);
	$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Utilisateur</title>
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
Informations sur l'équipement
</div>
<form class="form-out" action="liste-materiels.php" method="post">

	<label>Numéro</label>
	<input type="text" value="<?php echo $data['id']?>" disabled>
    <label>Libellé</label>
    <input type="text" value="<?php echo $data['lib_equip']?>" disabled>
	<label>Type</label>
    <input type="text" value="<?php echo $data['type_equip']?>" name="lib" disabled>
    <label>Description</label>
    <textarea name="description" disabled><?php echo $data['description']?></textarea>
    <label>Quantité</label>
    <input type="number" value="<?php echo $data['qtte']?>" disabled>
    <button type="submit" class="btn">Liste des équipements</button>

</form>
</div>
</div>
</body>
</html>

<?php
}
mysqli_close($link);
?>