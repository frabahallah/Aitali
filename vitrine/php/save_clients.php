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
	echo $_GET ['id'];
	if ($_GET ['id'] === 0) {
		$_GET ['id'] = $_POST ['CODE_CLIENT'];
		$sql = 'INSERT INTO clients(
					code_client, 
					societe, 
					adresse, 
					code_postal, 
					ville, 
					pays, 
					telephone, 
					fax)
				VALUES(
					:code_client, 
					:societe, 
					:adresse, 
					:code_postal, 
					:ville, 
					:pays, 
					:telephone, 
					:fax)';
	} else {
		$sql = 'UPDATE clients SET 
				societe = :societe,
				adresse = :adresse,
				ville = :ville,
				code_postal = :code_postal,
				pays = :pays,
				telephone = :telephone,
				fax = :fax
			WHERE code_client = :code_client';
	}
	echo $sql;
	$prep = $bdd->prepare ( $sql );
	// Exécution requête
	$params = array (
			':societe' => $_POST ['SOCIETE'],
			':adresse' => $_POST ['ADRESSE'],
			':ville' => $_POST ['VILLE'],
			':code_postal' => $_POST ['CODE_POSTAL'],
			':pays' => $_POST ['PAYS'],
			':telephone' => $_POST ['TELEPHONE'],
			':fax' => $_POST ['FAX'],
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