<?php
// Inclusion fichiers
include_once 'lib.inc.php';
try {
	// Connexion BDD
	$bdd = new PDO ( 'mysql:host=' . HOST . ';dbname=' . BASE, USER, PASS, array (
			PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8' 
	) );
	$bdd->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// Préparation requête
	$sql = 'DELETE FROM clients 
			WHERE code_client = :code_client';
	$prep = $bdd->prepare ( $sql );
	// Exécution requête
	$params = array (
			':code_client' => $_GET ['id'] 
	);
	$prep->execute ( $params );
	// Déconnexion BDD
	unset ( $bdd );
	// Redirection vers liste
	header ( 'location:list_clients.php' );
} catch ( PDOException $e ) {
	echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close">
			<span>&times;</span>
			</button>' . $e->getMessage () . '</div>';
}
?>