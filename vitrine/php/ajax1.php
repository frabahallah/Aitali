<?php
include_once 'lib.inc.php';
include_once 'bdd.class.php';
$bdd = new BDD ( HOST, BASE, USER, PASS );
// $res = $bdd->getRows ( 'SHOW TABLES' );
// echo json_encode ( $res );
echo $bdd->drawTable ( 'schema', 'Tables_in_northwind', 'SHOW TABLES' );
$bdd->disconnect ();
?>