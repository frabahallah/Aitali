<?php
// Si les 2 MDP sont égaux
if ($_POST ['pass'] === $_POST ['pass2']) {
	// Import des includes
	include_once 'lib.inc.php';
	include_once 'bdd.class.php';
	// Connexion et exécution requête
	$bdd = new BDD ( HOST, BASE, USER, PASS );
	$sql = 'INSERT INTO users(prenom, nom, mail, pass)
		VALUES(:prenom, :nom, :mail, :pass)';
	$params = array (
			':prenom' => $_POST ['prenom'],
			':nom' => $_POST ['nom'],
			':mail' => $_POST ['mail'],
			':pass' => sha1 ( $_POST ['pass'] ) 
	);
	$bdd->execQuery ( $sql, $params );
	$bdd->disconnect ();
	// Envoi mail
	$to = $_POST ['mail'];
	$subject = 'Bienvenue';
	$msg = 'Salut ' . $_POST ['prenom'] . ',' . "\r\n";
	$msg .= 'Ton inscription a bien été validée :' . "\r\n";
	$msg .= '- lien : ' . $_SERVER ['SERVER_NAME'] . '/vitrine/php/login.php' . "\r\n";
	$msg .= '- ton login : ' . $_POST ['mail'] . "\r\n";
	$msg .= '- ton mot de passe : ' . $_POST ['pass'] . "\r\n";
	$msg .= 'A bientôt';
	$headers = 'From: noreply@cdi-impexp.com';
	ini_set ( 'SMTP', 'smtp.laposte.net' );
	ini_set ( 'sendmail_from', 'max.cardo@laposte.net' );
	ini_set ( 'smtp_port', 465 );
	mail ( $to, $subject, $msg, $headers );
	// Retour à l'index
	header ( 'location:../index.html' );
} else {
	echo '<p>Les mots de passe ne sont pas identiques !</p>';
	echo '<a href="register.php">Réessayer</a>';
}
?>











