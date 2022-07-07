<?php
session_start();
if (isset($_SESSION['info']))
    $info = $_SESSION['info'];
else {
    $info = "";
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet">
<link href="css/font-style.css" rel="stylesheet">
</head>
<body style="background-color: #141414;">
	<nav>
	<div class="buttons">
	<a class="login" href="index.php">J'ai déjà un compte</a>
	<a class="register" href="create.php">S'enregistrer</a>
	</div>
	</nav>
    <form class ="myfirstform" action="verif-create.php" method="post">
    <h1>Nouveau compte</h1>
    <hr>
    <?php if (!empty($info)) { ?>
    <div class="alert">
    <?php echo $info ?>
    </div>
    <?php } ?>
    <input type="text" placeholder="Nom et prénom" name="fullname" required>
    <input type="email" placeholder="E-Mail" name="email" required>
    <input type="text" placeholder="Nom d'utilisateur" name="username" required>
    <input type="password" placeholder="Mot de passe" name="password" required>
    <input type="password" placeholder="Confirmer le mot de passe" name="confirm_password" required>
    <button type="submit" class="btn">S'inscrire</button>
	</form>
	<footer>
	<h5>Gestion d'un parc informatique</h5>
	<p>&copy; 2022 , L2CS</p>
	</footer>
</body>
</html>
