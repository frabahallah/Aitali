<?php
// Récupère la racine du domaine en cours
$cur_domain = $_SERVER ['HTTP_HOST'];
// Renvoie vers le portail du site
header ( 'Location: http://' . $cur_domain . '/vitrine' );
?>