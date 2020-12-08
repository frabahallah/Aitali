<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<title>CDI Import/Export : PHP</title>
</head>
<body>
<?php
session_start();
if ($_SESSION['connected']) {
?>
	<div class="container">
		<div class="jumbotron">
			<h1>CDI Import/Export</h1>
			<p>Bienvenue <?php echo $_SESSION['prenom']; ?> dans l'interface back-office pour gérer les données de
				l'entreprise.</p>
			<p>
				<a href="logout.php" class="btn btn-warning">Déconnexion</a>
			</p>
		</div>
		<div class="panel panel-primary" id="myPanel">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des tables dans NORTHWIND</h3>
			</div>
			<div class="panel-body">
				<div id="result"></div>
				<a id="callAjax1" class="btn btn-default">AJAX 1</a>
			</div>
		</div>
		<div class="panel panel-success" id="myPanel2">
			<div class="panel-heading">
				<h3 class="panel-title">Requête AJAX cross-domain</h3>
			</div>
			<div class="panel-body">
				<div id="result2"></div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Entrez un code postal"/>
					<span class="input-group-btn">
						<button id="callAjax2" class="btn btn-default">AJAX 2</button>
					</span>
				</div>
			</div>
		</div>
		<div class="row"></div>
	</div>
	<script src="js/menu.js"></script>
	<?php } else { ?>
	<div class="alert alert-danger">Vous devez être connecté</div>
	<?php } ?>
</body>
</html>







