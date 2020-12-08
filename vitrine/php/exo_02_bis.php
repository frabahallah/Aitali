<h1>Exercice 2</h1>
<table>
	<tr>
		<th>Index</th>
		<th>Description</th>
	</tr>
	<?php
	$i = 1;
	$code = '';
	while ( $i < 9 ) {
		$code .= '<tr><td>' . $i . '</td><td>Texte ' . $i . '</td></tr>';
		$i += 2;
	}
	echo $code;
	?>
</table>