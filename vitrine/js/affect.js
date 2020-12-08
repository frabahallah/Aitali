// Gestion des événements
window.onload = function() {
	addMembers();
	// Branchement des écouteurs d'événement
	var aElts = document.querySelectorAll('div#dnd>div[id^=box]');
	for (var i = 0; i < aElts.length; i++) {
		aElts[i].addEventListener('dragstart', function(e) {
			dragStart(e);
		}, false);
		aElts[i].addEventListener('dragover', function(e) {
			dragOver(e);
		}, false);
		aElts[i].addEventListener('drop', function(e) {
			drop(e);
		}, false);
	}
	// Branchement d'un écouteur d'événement
	var oBtn = document.getElementById('saveAffect');
	oBtn.addEventListener('click', saveAffect, false);
};

// Code fonctionnel
addMembers = function() {
	// Variables locales
	var j;
	var oImg;
	var oBox1 = document.getElementById('box1');
	var aTeam = new Array('Mannique', 'Mamadou', 'Steve', 'Hassan', 'Patrick',
			'Irinna', 'Mohamed D', 'Eliot', 'Mehdi', 'Elie', 'Mohamed AA',
			'Michel', 'Lesly', 'Radouane', 'Nathalie');
	for (var i = 0; i < aTeam.length; i++) {
		j = Math.floor(Math.random() * 6 + 1);
		oImg = document.createElement('img');
		oImg.setAttribute('id', 'per' + i);
		oImg.setAttribute('src', 'pics/per' + j + '.png');
		oImg.setAttribute('title', aTeam[i]);
		oImg.setAttribute('draggable', 'true');
		oBox1.appendChild(oImg);
	}
};

// Code fonctionnel : Drag'n'Drop (e = événement déclenché)
dragStart = function(e) {
	// Stocke en mémoire l'ID de l'image glissée
	e.dataTransfer.setData('curID', e.target.id);
};

dragOver = function(e) {
	// Si la boite survolée à un ID commençant par BOX
	if (e.target.id.indexOf('box') == 0) {
		e.preventDefault();
	}
};

drop = function(e) {
	var curID = e.dataTransfer.getData('curID');
	var oImg = document.getElementById(curID);
	e.target.appendChild(oImg);
	e.preventDefault();
	return false;
};

// Code fonctionnel : Clic sur bouton SAVE
saveAffect = function() {
	var oKey, aImgs, oList;
	var aBoxes = document.querySelectorAll('div#dnd>div[id^=box]');
	for (var i = 0; i < aBoxes.length; i++) {
		oKey = aBoxes[i].querySelector('h2');
		aImgs = aBoxes[i].querySelectorAll('img[id^=per]');
		oList = {};
		for (var j = 0; j < aImgs.length; j++) {
			oList[j + 1] = aImgs[j].title;
		}
		localStorage.setItem(oKey.innerHTML, JSON.stringify(oList));
	}
	// Renvoie vers la page services.html
	location.href = 'services.html';
};