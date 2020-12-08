<?php
include_once 'bdd.class.php';
$test = new BDD ( 'localhost', 'northwind', 'root', 'root' );
// echo $test->isConnected;
$sql = 'SELECT * 
		FROM produits 
		WHERE prix_unitaire BETWEEN :min AND :max';
$var = array (
		':min' => 10,
		':max' => 30 
);
echo $test->drawSelect ('', 'code_cli', 'SELECT code_client, societe FROM clients' );
echo $test->drawTable ('produits','REF_PRODUIT', $sql, $var );
?>