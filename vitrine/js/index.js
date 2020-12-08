// Variables globales
var aPics = new Array();
var iPos = 0;
var oImg = document.querySelector('div#slide>img');

window.onload = function() {
	// Initialise le tableau avec les images (Slides)
	aPics[0] = 'pics/slide1.jpg';
	aPics[1] = 'pics/slide2.jpg';
	aPics[2] = 'pics/slide3.jpg';
	// Branchements
	changeBaseline();
	showNews();
	swapImage();
	drawLogo();
	loadCover();
};

loadCover = function() {
	var oNow = new Date();
	var iDay = oNow.getDay();
	switch (iDay) {
	case 3:
		document.body.className = 'mercredi';
		break;
	case 5:
		document.body.className = 'vendredi';
		break;
	default:
		document.body.className = 'imgFond';
	}
};

drawLogo = function() {
	var oLogo = document.getElementById('myLogo');
	var oPen = oLogo.getContext('2d');
	// oPen.fillStyle = '#00ff00';
	// oPen.fillRect(10, 10, 60, 60);
	// oPen.fillStyle = '#0000ff';
	// oPen.fillRect(20, 20, 40, 40);
	var x = oLogo.width / 2;
	var y = oLogo.height / 2;
	var rayon = 25;
	// Visage
	oPen.beginPath();
	oPen.arc(x, y, rayon, 0, Math.PI * 2, false);
	oPen.fillStyle = '#ffff00';
	oPen.fill();
	oPen.stroke();
	oPen.closePath();
	// Nez
	oPen.beginPath();
	oPen.arc(x, y + 5, rayon / 5, 0, Math.PI * 2, false);
	oPen.fillStyle = '#ff0000';
	oPen.fill();
	oPen.closePath();
	// Yeux
	oPen.beginPath();
	oPen.arc(x - 10, y - 5, rayon / 7, 0, Math.PI * 2, false);
	oPen.fillStyle = '#0000ff';
	oPen.fill();
	oPen.arc(x + 10, y - 5, rayon / 7, 0, Math.PI * 2, false);
	oPen.fillStyle = '#0000ff';
	oPen.fill();
	oPen.closePath();
	// Bouche
	oPen.beginPath();
	oPen.arc(x, y, rayon - 5, 0, Math.PI, false);
	oPen.stroke();
	oPen.closePath();
	// Chapeau
	oPen.beginPath();
	oPen.fillStyle = '#000000';
	oPen.fillRect(x - rayon - 10, y - rayon + 5, (rayon + 10) * 2, 5);
	oPen.fillRect(x - rayon, y - rayon - 20, (rayon) * 2, 25);
	oPen.closePath();
	// Texte
	oPen.font = '15pt Arial';
	oPen.strokeStyle = '#ffffff';
	oPen.lineWidth = 2;
	oPen.strokeText('CDI', x - rayon + 7, y - rayon + 2);
};

swapImage = function() {
	oImg.src = aPics[iPos];
	if (iPos < aPics.length - 1) {
		iPos++;
	} else {
		iPos = 0;
	}
	setTimeout('swapImage()', 5000);
};

showNews = function() {
	var eActus = document.getElementById('actus');
	var tTxt = document.createTextNode('Actualités du ' + dateDuJour(3));
	var eTag = document.createElement('h4');
	eActus.innerHTML = '';
	eTag.appendChild(tTxt);
	eActus.appendChild(eTag);
};

changeBaseline = function() {
	var dNow = new Date();
	var iJour = dNow.getDay();
	var eSlogan = document.getElementById('slogan');
	switch (iJour) {
	case 1:
		eSlogan.innerHTML = 'Comme un <b>lundi</b>';
		break;
	case 2:
		eSlogan.innerHTML = 'Les mardi c\'est permis';
		break;
	case 3:
		eSlogan.innerHTML = 'Mercredi c\'est ravioli';
		break;
	case 4:
		eSlogan.innerHTML = 'Plus qu\'un jour';
		break;
	case 5:
		eSlogan.innerHTML = 'Dieu merci c\'est vendredi';
		break;
	default:
		// Ne fait rien
	}
};