<?php
require_once "../securite.php";
require_once "../config.inc.php";
setlocale(LC_TIME, 'fra_fra');
$dt = strftime('%d-%m-%Y');
$identite = $_SESSION['user']['id']; #user id
$fullanme = $_SESSION['user']['name']; #user fullanme
if($_GET)
{
extract($_GET);
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
Réservation matériel
</div>
<form class="form-out" style="" action="action-reservation.php" method="post">
	<input type="hidden" name="identite" value="<?php echo $identite ?>">
	<input type="hidden" name="fullanme" value="<?php echo $fullanme ?>">
	<label>ID équipement</label>
	<input type="text" value="<?php echo $value1 ?>" name="id_equip" readonly>
    <label>Libellé équipement</label>
    <input type="text" value="<?php echo $value2 ?>" name="lib_equip" readonly>
	<label>Type équipement</label>
    <input type="text" value="<?php echo $value3 ?>" name="type_equip" readonly>
	<label>Quantité</label>
    <input type="text" value="<?php echo $value4 ?>" name="qtte" readonly>
	<label>Date de réservation</label>
    <input type="text" value="<?php echo $dt ?>" name="dt_reserv" readonly>
    <input type="number" name="jr_prevu" placeholder = "Nombre de jour prévue" min="1" max="7" required>
	
    <button type="submit" class="btn">Réserver ce matériel</button>
</form>
</div>
</div>
</body>
</html>

<?php
}
mysqli_close($link);
?>