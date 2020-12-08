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
<form action="save_clients.php?id=<?php echo $_GET['id']; ?>"
				method="post">
<?php
include_once 'lib.inc.php';
$bdd = new PDO ( 'mysql:host=' . HOST . ';dbname=' . BASE, USER, PASS );
$req = 'SELECT * FROM clients WHERE code_client=\'' . $_GET ['id'] . '\'';
$res = $bdd->query ( $req );
$res->setFetchMode ( PDO::FETCH_ASSOC );
if ($_GET ['id'] === 0) {
	// Si ajout
	$row = array (
			'CODE_CLIENT' => '',
			'SOCIETE' => '',
			'ADRESSE' => '',
			'VILLE' => '',
			'CODE_POSTAL' => '',
			'PAYS' => '',
			'TELEPHONE' => '',
			'FAX' => '' 
	);
} else {
	// Si modification
	$row = $res->fetch ();
}
$aff = '';
foreach ( $row as $key => $val ) {
	$aff .= '<div class="form-group">';
	$aff .= '<label>' . $key . '</label>';
	$aff .= '<input type="text" name="' . $key . '" class="form-control" value="' . $val . '">';
	$aff .= '</div>';
}
echo utf8_encode ( $aff );
unset ( $bdd );
?>
<button type="submit" class="btn btn-primary">Enregistrer</button>
			</form>
		</div>
	</div>
</body>
</html>