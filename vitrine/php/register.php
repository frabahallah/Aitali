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
	<h1>Enregistrement<small>... venez nous rejoindre</small></h1>
</div>
<form action="set_user.php" method="post">
	<div class="form-group">
		<label for="prenom">Prénom</label>
		<input id="prenom" name="prenom" class="form-control" type="text">
	</div>
	<div class="form-group">
		<label for="nom">Nom</label>
		<input id="nom" name="nom" class="form-control" type="text">
	</div>
	<div class="form-group">
		<label for="mail">EMail</label>
		<input id="mail" name="mail" class="form-control" type="email" required>
	</div>
	<div class="form-group">
		<label for="pass">Mot de passe</label>
		<input id="pass" name="pass" class="form-control" type="password" required>
	</div>
		<div class="form-group">
		<label for="pass2">Confirmation mot de passe</label>
		<input id="pass2" name="pass2" class="form-control" type="password" required>
	</div>
	<button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</div>
</div>
</body>
</html>