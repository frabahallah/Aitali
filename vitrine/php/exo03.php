<h1>Exercice 3</h1>
<table>
	<tr>
		<th>Poste</th>
		<th>Pr&eacute;nom</th>
	</tr>
<?php
$eleve= array(
		"PC1" => "Elie",		
		"PC2" => "Mehdi",
		"PC3" => "Eliot",
		"PC6" => "Michel",
		"PC7" => "Mohamed AA",
		"PC8" => "Mohamed D",
		"PC9" => "Mamadou",
		"PC11" => "Mannique",
		"PC13" => "Irinna",
		"PC14" => "Patrick",
		"PC15" => "Hassan",
		"PC0" => "Lesly",
);
// tries sur les tableaux
asort($eleve);
// Pour chaque membre du tableau
$code = "";
foreach ( $eleve as $key => $val) {
	$code .= "<tr><td>" .subst($key,2) ."</td><td>" .$val ."</td></tr>";
}
echo $code;
?>
</table>