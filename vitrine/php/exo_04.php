<h1>Exercice 4</h1>
<table>
	<tr>
		<th>Cl&eacute;s</th>
		<th>Valeurs</th>
	</tr>
	<?php
	$code = "";
	// Pour chaque membre du tableau renvoyé par le formulaire
	foreach ( $_GET as $key => $val ) {
		if (! is_array ( $val )) {
			$code .= "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
		} else {
			$code .= "<tr><td>" . $key . "</td><td>" . implode(",", $val) . "</td></tr>";
		}
	}
	echo $code;
	?>
</table>