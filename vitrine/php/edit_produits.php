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
<?php
if (! isset ( $_GET ['id'] )) {
	$_GET ['id'] = 0;
}
?>
<form action="save_produits.php?id=<?php echo $_GET['id']; ?>"
				method="post">
<?php
include_once 'lib.inc.php';
include_once 'bdd.class.php';
$bdd = new BDD ( HOST, BASE, USER, PASS );
$req = 'SELECT * FROM produits WHERE ref_produit = :id';
$var = array (
		':id' => $_GET ['id'] 
);

if ($_GET ['id'] === 0) {
	// Si ajout
	$row = array (
			'REF_PRODUIT' => '',
			'NOM_PRODUIT' => '',
			'NO_FOURNISSEUR' => '',
			'CODE_CATEGORIE' => '',
			'QUANTITE' => '',
			'PRIX_UNITAIRE' => '',
			'UNITES_STOCK' => '',
			'UNITES_COMMANDEES' => '',
			'INDISPONIBLE' => '' 
	);
} else {
	// Si modification
	$row = $bdd->getRow ( $req, $var );
}
$aff = '';
foreach ( $row as $key => $val ) {
	$aff .= '<div class="form-group">';
	$aff .= '<label>' . $key . '</label>';
	switch ($key) {
		case 'NO_FOURNISSEUR' :
			$aff .= $bdd->drawSelect ( $val, $key, 'SELECT no_fournisseur, societe FROM fournisseurs' );
			break;
		case 'CODE_CATEGORIE' :
			$aff .= $bdd->drawSelect ( $val, $key, 'SELECT code_categorie, nom_categorie FROM categories' );
			break;
		default :
			$aff .= '<input type="text" name="' . $key . '" class="form-control" value="' . $val . '">';
	}
	$aff .= '</div>';
}
echo $aff;
$bdd->disconnect ();
?>
<button type="submit" class="btn btn-primary">Enregistrer</button>
			</form>
		</div>
	</div>
</body>
</html>