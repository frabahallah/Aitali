/**
 * Affiche les produits par fournisseurs
 * 
 */

// Variables globales
var oSelect = document.getElementById('no_four');
var oDiv = document.getElementById('produits');

// Association de l'événement à la liste
oSelect.onchange = function() {
	var oXhr = new XMLHttpRequest();
	oXhr.onreadystatechange = function() {
		if (oXhr.readyState == 4) {
			oDiv.innerHTML = oXhr.responseText;
		}
	};
	oXhr.open('post', 'ajax2.php', true);
	oXhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
	oXhr.send('id=' + oSelect.value);
};
