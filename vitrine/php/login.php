<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<title>CDI Import/Export : PHP</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="page-header">
	<h1>Connexion</h1>
</div>
<form action="get_user.php" method="post">
	<div class="form-group">
		<label for="mail">EMail</label>
		<input id="mail" name="mail" class="form-control" type="email" required>
	</div>
	<div class="form-group">
		<label for="pass">Mot de passe</label>
		<input id="pass" name="pass" class="form-control" type="password" required>
	</div>
	<button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<br>
<a href="register.php">Cliquez ici pour créer un compte</a>
</div>
</div>
</body>
</html>





