// Associe les éléments de mon arbre DOM à des variables
var oHT = document.getElementById('ht');
var oTaux = document.getElementById('taux');
var oBtn = document.getElementById('btn');
var oResult = document.getElementById('result');

// Branchement du bouton sur l'événement click
oBtn.onclick = function() {
	oResult.innerHTML = convertTTC(parseFloat(oHT.value),
			parseFloat(oTaux.value));
	console.log('test');
};