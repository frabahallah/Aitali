<h1>Exercice 2</h1>
<table>
	<tr>
		<th>Index</th>
		<th>Description</th>
	</tr>
	<?php
	$i = 1; 
	while ($i < 9) { 
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo 'Texte '.$i; ?></td>
	</tr>
	<?php
	$i += 2; 
	} 
	?>
</table>