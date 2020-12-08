<h1>Employes</h1>
<?php
if (isset ( $_GET ['status'] )) {
	if ($_GET ['status'] == 'ok') {
		echo '<div class="alert alert-success">Enregistrement OK</div>';
	} elseif ($_GET ['status'] == 'ko') {
		echo '<div class="alert alert-danger">Enregistrement KO</div>';
	}
}
?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>No</th>
		<th>Manager</th>
		<th>Nom</th>
		<th>Pr&eacute;nom</th>
		<th>Fonction</th>
		<th>Titre</th>
		<th>Naissance</th>
		<th>Embauche</th>
		<th>Salaire</th>
		<th>Commission</th>
		<th></th>
	</tr>
<?php
// Connexion à la BDD (en mode procédural)
$bdd = mysqli_connect ( 'localhost', 'root', 'root', 'northwind' );
if ($bdd) {
	// Succès connexion
	echo 'Connexion r&eacute;ussie.<br/>';
	echo 'Infos serveur : ' . mysqli_get_host_info ( $bdd ) . '<br/>';
	// Exécution requête
	$req = 'SELECT * FROM employes';
	$res = mysqli_query ( $bdd, $req );
	if ($res) {
		// Succès requête
		echo 'Ex&eacute;cution requ&ecirc;te OK<br/>';
		$aff = '';
		while ( $row = mysqli_fetch_assoc ( $res ) ) {
			$aff .= '<tr>';
			foreach ( $row as $key => $val ) {
				// var_dump ( $row );
				$aff .= '<td>' . $val . '</td>';
			}
			$aff .= '<td><a href="edit_employes.php?id=' . $row ['NO_EMPLOYE'] . '">Modifier</a></td>';
			$aff .= '</tr>';
		}
	} else {
		// Echec requête
		echo 'Ex&eacute;cution requ&ecirc;te KO<br/>';
	}
	if (mysqli_close ( $bdd )) {
		// Succès déconnexion
		echo 'D&eacute;connexion OK<br/>';
	} else {
		// Echec déconnexion
		echo 'D&eacute;connexion KO<br/>';
	}
	// Renvoie le code HTML
	echo utf8_encode ( $aff );
} else {
	// Echec connexion
	printf ( 'Erreur %d : %s<br/>', mysqli_connect_errno (), mysqli_connect_error () );
}
?>
</table>