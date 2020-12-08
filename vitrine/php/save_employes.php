<?php
/**
 * Mise à jour de l'employé dans la table
 * Mode : Procédural (env. 1995-2000)
 */
// Connexion à la BDD
$bdd = mysqli_connect ( 'localhost', 'root', 'root', 'northwind' );
// Création de la requête de MAJ
$commission = (float) $_POST['COMMISSION'];
$rend_compte = (integer) $_POST['REND_COMPTE'];
$req = 'UPDATE employes	SET '
		.'rend_compte = ' . $rend_compte . ', '
		.'nom = \'' . str_replace("'", "''", $_POST['NOM']) . '\', '
		.'prenom = \'' . $_POST['PRENOM'] . '\', '
		.'fonction = \'' . $_POST['FONCTION'] . '\', '
		.'titre = \'' . $_POST['TITRE'] . '\', '
		.'date_naissance = \'' . $_POST['DATE_NAISSANCE'] . '\', '
		.'date_embauche = \'' . $_POST['DATE_EMBAUCHE'] . '\', '
		.'salaire = ' . $_POST['SALAIRE'] . ', '
		.'commission = ' . $commission . ' '
		.'WHERE no_employe = ' . $_GET['id']
; 
$req = htmlentities($req);
echo $req;
// Exécution de la requête
$res = mysqli_query($bdd, $req);
if ($res == false){
	$status ='ko';
} else {
	$status ='ok';
}
// Fermeture de la connexion
mysqli_close($bdd);
// Redirection vers la page 'liste des employés'
header('location:list_employes.php?status='.$status);
?>