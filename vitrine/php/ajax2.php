<?php
include_once 'lib.inc.php';
include_once 'bdd.class.php';
$bdd = new BDD ( HOST, BASE, USER, PASS );
$sql = 'SELECT ref_produit AS "Code",
		nom_produit AS "Produit", 
		quantite AS "Conditionnement",
		prix_unitaire AS "PU HT",
		prix_unitaire * 1.1 AS "PU TTC",
		prix_unitaire * IFNULL(unites_stock, 0) AS "Valeur de stock"
		FROM produits
		WHERE no_fournisseur = :id';
$params = array (
		':id' => $_POST ['id'] 
);
$res = $bdd->drawTable ( 'produits', 'Code', $sql, $params );
echo $res;
$bdd->disconnect ();
?>