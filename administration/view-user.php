<?php
require_once "../securite.php";
require_once "../config.inc.php";
if($_GET)
{
	extract($_GET);
	$sql = "select * from utilisateurs where id = '$id'";
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
Informations sur l'utilisateur
</div>
<form class="form-out" action="g-utilisateurs.php" method="post">

	<label>ID</label>
	<input type="text" value="<?php echo $data['id']?>" disabled>
    <label>Nom et prénom</label>
    <input type="text" value="<?php echo $data['name']?>" disabled>
	<label>E-Mail</label>
    <input type="text" value="<?php echo $data['email']?>" name="lib" disabled>
    <label>Pseudonyme</label>
    <input type="text" value="<?php echo $data['username']?>" disabled>
    <label>Rôle</label>
    <input type="text" value="<?php echo $data['role']?>" disabled>
	<label>Status</label>
    <input type="text" value="<?php echo $data['status']?>" disabled>
    <button type="submit" class="btn">Liste des utilisateurs</button>

</form>
</div>
</div>
</body>
</html>

<?php
}
mysqli_close($link);
?>