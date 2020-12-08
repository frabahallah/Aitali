<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
<title>CDI Import/Export : PHP</title>
</head>
<body>
<div class="container">
<div class="row">
<form action="save_employes.php?id=<?php echo $_GET['id']; ?>" method="post">
<?php
$bdd = mysqli_connect('localhost','root','root','northwind');
$req = 'SELECT * FROM employes WHERE no_employe='.$_GET['id'];
$res = mysqli_query($bdd, $req);
$row = mysqli_fetch_assoc($res);
$aff = '';
foreach ($row as $key=>$val){
	$aff .= '<div class="form-group">';
	$aff .= '<label>'.$key.'</label>';
	$aff .= '<input type="text" name="'.$key.'" class="form-control" value="'.$val.'">';
	$aff .= '</div>';
}
echo utf8_encode($aff);
mysqli_close($bdd); 
?>
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>
</div>
</body>
</html>