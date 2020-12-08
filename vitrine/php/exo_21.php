<h1>Clients</h1>
<a href="edit_clients.php" class="btn btn-success">Ajouter</a>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Code</th>
		<th>Raison</th>
		<th>Adresse</th>
		<th>Ville</th>
		<th>CP</th>
		<th>Pays</th>
		<th>Tel</th>
		<th>Fax</th>
		<th></th>
		<th></th>
	</tr>
<?php
// Inclusion du fichier de paramètres
include_once 'lib.inc.php';
try {
	// Connexion à la BDD (en mode objet)
	$bdd = new PDO ( 'mysql:host=' . HOST . ';dbname=' . BASE, USER, PASS );
	$bdd->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// Récupération des données
	$res = $bdd->query ( 'SELECT * FROM clients' );
	$res->setFetchMode ( PDO::FETCH_ASSOC );
	echo $res->rowCount ();
	$code = '';
	foreach ( $res as $row ) {
		$code .= '<tr>' ."\n";
		foreach ( $row as $key => $val ) {
			$code .= '<td>' . $val . '</td>' ."\n";
		}
		$code .= '<td><a href="edit_clients.php?id='. $row ['CODE_CLIENT'] . '">Edit</a></td>' ."\n";
		$code .= '<td><a href="supr_clients.php?id='. $row ['CODE_CLIENT'] . '">Suppr</a></td>' ."\n";
		$code .= '</tr>' ."\n";
	}
	echo utf8_encode ( $code );
	unset ( $bdd );
} catch ( PDOException $e ) {
	// Affichage message erreur
	echo '<div class="alert alert-danger">' . $e->getMessage () . '</div>';
}
?>
</table>