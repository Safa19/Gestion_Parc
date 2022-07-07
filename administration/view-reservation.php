<?php
require_once "../securite.php";
require_once "../config.inc.php";
if($_GET)
{
	extract($_GET);
	$sql = "select * from reservation where num = '$id'";
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
Informations sur le matériel réservé
</div>
<form class="form-out" action="all-reservations.php" method="post">

	<label>Numéro</label>
	<input type="text" value="<?php echo $data['num']?>" disabled>
    <label>Nom et prénom</label>
    <input type="text" value="<?php echo $data['NameU']?>" disabled>
	<label>Date de réservation</label>
    <input type="text" value="<?php echo $data['dateR']?>" disabled>
    <label>Jour prévu</label>
	<input type="text" value="<?php echo $data['jrPrevu']?>" disabled>

    <label>Libellé équipement</label>
    <input type="text" value="<?php echo $data['libE']?>" disabled>
	<label>Type équipement</label>
	<input type="text" value="<?php echo $data['typeE']?>" disabled>
    <button type="submit" class="btn">Toutes les réservations</button>

</form>
</div>
</div>
</body>
</html>

<?php
}
mysqli_close($link);
?>