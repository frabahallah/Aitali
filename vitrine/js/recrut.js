// Variables objet globales
var oSalaire = document.getElementById('salaire');
var oUnite = document.getElementById('unite');
var oTous = document.getElementById('tous');

// Associer l'événement change à l'élément range
oSalaire.onchange = function() {
	oUnite.innerHTML = oSalaire.value + 'K€';
};

// Associer l'événement click à l'élément checkbox
oTous.onclick = function() {
	// Méthode 1
	// document.getElementById('contrat1').checked = oTous.checked;
	// document.getElementById('contrat2').checked = oTous.checked;
	// document.getElementById('contrat3').checked = oTous.checked;
	// document.getElementById('contrat4').checked = oTous.checked;

	// Méthode 2
	// var aChks = document.getElementsByTagName('input');
	// console.log(aChks.length);
	// for (i = 0; i < aChks.length; i++) {
	// if ((aChks[i].type == 'checkbox')
	// && (aChks[i].name.indexOf('contrat') == 0)) {
	// aChks[i].checked = oTous.checked;
	// }
	// }

	// Méthode 3
	var aChks = document
			.querySelectorAll('form#frmRecrut input[type=checkbox][name^=contrat]');
	console.log(aChks.length);
	for (i = 0; i < aChks.length; i++) {
		aChks[i].checked = oTous.checked;
	}

};
