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
			<h1>Produits</h1>
<?php
// Inclusion de la classe
include_once 'bdd.class.php';
// Connexion
$bdd = new BDD ( "localhost", "northwind", "root", "root" );
// Affiche le SELECT : tous les fournisseurs
echo $bdd->drawSelect ( '', 'no_four', 'select no_fournisseur, societe from fournisseurs' );
echo '</br>';
// Affiche la TABLE : tous les produits
$sql = 'SELECT ref_produit AS "Code",
		nom_produit AS "Produit", 
		quantite AS "Conditionnement",
		prix_unitaire AS "PU HT",
		prix_unitaire * 1.1 AS "PU TTC",
		prix_unitaire * IFNULL(unites_stock, 0) AS "Valeur de stock"
		FROM produits';
echo '<div id="produits">';
echo $bdd->drawTable ( 'produits', 'Code', $sql );
echo '</div>';
?>
</div>
	</div>
	<script src="js/list_produits.js"></script>
</body>
</html>