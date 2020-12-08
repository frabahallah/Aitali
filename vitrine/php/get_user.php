<?php
include_once 'lib.inc.php';
include_once 'bdd.class.php';
$bdd = new BDD ( HOST, BASE, USER, PASS );
$sql = 'SELECT *
		FROM users
		WHERE mail = :mail
		AND pass = SHA1(:pass)';
$params = array (
		':mail' => $_POST ['mail'],
		':pass' => $_POST ['pass'] 
);
$res = $bdd->getRow ( $sql, $params );
session_start ();
if ($res == false) {
	$_SESSION ['connected'] = false;
	echo '<a href="login.php">La connexion a &eacute;chou&eacute;</a>';
} else {
	// Stockage des variables de session
	$_SESSION ['connected'] = true;
	$_SESSION ['prenom'] = $res ['prenom'];
	$_SESSION ['nom'] = $res ['nom'];
	$_SESSION ['mail'] = $res ['mail'];
	header ( 'location:menu.php' );
}
$bdd->disconnect ();
?>













