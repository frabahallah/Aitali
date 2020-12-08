<h1>Exercice 4</h1>
<table>
	<tr>
		<th>clés</th>
		<th>Valeurs</th>
	</tr>
<?php
$code = "";
foreach ($_GET as $key => $val){
 	$code .= "<tr><td>". $key . "</td><td>". $val . "</td></tr>";
}
		echo $code;
?>