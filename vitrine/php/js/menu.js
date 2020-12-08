/**
 * Routine JS pour le fichier menu.php
 */
var oBouton1 = document.getElementById('callAjax1');
var oBouton2 = document.getElementById('callAjax2');

oBouton2.onclick = function() {
	var oXhr = new XMLHttpRequest();
	oXhr.onreadystatechange = function() {
		if (oXhr.readyState == 4) {
			document.getElementById('result2').innerHTML = oXhr.responseText;
		}
	};
	var oInput = document
			.querySelector('div[class=input-group]>input[class=form-control]');
	var sUrl = 'http://api.zippopotam.us/FR/' + oInput.value;
	oXhr.open('get', sUrl, true);
	oXhr.send(null);
};

oBouton1.onclick = function() {
	// Instanciation de l'objet XmlHttpRequest
	oXhr = new XMLHttpRequest();
	// Action à réaliser quand le statut change
	oXhr.onreadystatechange = function() {
		console.log(oXhr.readyState);
		if (oXhr.readyState == 4) {
			document.getElementById('result').innerHTML = oXhr.responseText;
		}
	};
	// Ouverture de la requête
	oXhr.open('get', 'ajax1.php', true);
	// Envoi de la requête
	oXhr.send(null);
	// Message de fin
	// alert('Test réussi');
};
