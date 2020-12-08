// Sauvegarde, lecture et suppression de cookies
saveCookie = function(sCle, sVal, iVie) {
	if (iVie) {
		var oFin = new Date();
		oFin.setTime(oFin.getTime() + (1000 * 60 * 60 * 24 * iVie));
		var sExp = 'expires=' + oFin.toGMTString();
	} else
		var sExp = '';
	document.cookie = sCle + '=' + sVal + ';' + sExp;
};

readCookie = function(sCle) {
	var sKey = sCle + '=';
	var aCookies = document.cookie.split(';');
	for (var i = 0; i < aCookies.length; i++) {
		var sCookie = aCookies[i];
		while (sCookie.charAt(0) == ' ') {
			sCookie = sCookie.substring(1, sCookie.length);
		}
		if (sCookie.indexOf(sKey) == 0) {
			return sCookie.substring(sKey.length, sCookie.length);
		}
	}
	return null;
};

// Fonction qui dit bonjour dans la langue indiquée (code ISO 639-1)
// String code : code de la langue
// Version : 1.0
function direBonjour1(code) {
	if (code == 'FR') {
		return 'Salut';
	} else if (code == 'en') {
		return 'Hello';
	} else if (code == 'De') {
		return 'Halo';
	} else {
		alert('Code non reconnu');
	}
}

function direBonjour2(code) {
	code = code.toLowerCase();
	switch (code) {
	case 'es':
	case 'mx':
	case 'ar':
		return 'Holà';
		break;
	case 'be':
	case 'fr':
		return 'Salut';
		break;
	case 'en':
		return 'Hello';
		break;
	case 'de':
		return 'Halo';
		break;
	default:
		alert('Code non reconnu');
	}
}

// Autre façon de créer une fonction en JS
direBonjour3 = function(code) {
	// Créer le tableau contenant les traductions
	var aLangs = new Array();
	aLangs.push('fr:Salut');
	aLangs.push('BE:Salut');
	aLangs.push('en:Hello');
	aLangs.push('Es:Holà');
	aLangs.push('mx:Holà');
	aLangs.push('ar:Wesh');
	aLangs.push('GR:Ya');
	// Renvoi bonjour dans la langue choisie
	for (i = 0; i < 7; i++) {
		sCode = aLangs[i].substr(0, 2);
		if (sCode.toLowerCase() == code.toLowerCase()) {
			sMsg = aLangs[i].slice(3);
			return sMsg;
			break;
		}
	}
};

// Dernière déclinaison de la fonction avec un objet
direBonjour = function(code) {
	// Créer le tableau associatif contenant les traductions
	var aLangs = new Array();
	aLangs['ar'] = 'Wesh ma geule';
	aLangs['fr'] = 'Salut ma geule';
	aLangs['en'] = 'Hi bucket';
	aLangs['es'] = 'Holà carajo';
	aLangs['gr'] = 'Ya malaka';
	console.log(aLangs);
	// Renvoi bonjour dans la langue choisie
	for (sCle in aLangs) {
		if (sCle.toLowerCase() == code.toLowerCase()) {
			return aLangs[sCle];
			break;
		}
	}
	alert('Le code ' + code + ' n\'existe pas');
};

// Fonction qui renvoie la date du jour formattée
// Number fmt : 1=jj/mm/aaaa, 2=aaaa-mm-jj, 3=jjjj j mmmm aaaa
dateDuJour = function(fmt) {
	// Variables locales
	var oDJ = new Date(); // Date du jour
	var iSem = oDJ.getDay(); // Jour de la semaine : 0=Dim à 6=Sam
	var iJour = oDJ.getDate(); // Jour du mois
	var iMois = oDJ.getMonth(); // Mois : 0=Jan à 11=Déc
	var iAnnee = oDJ.getFullYear(); // Année avec millésime
	var aMois = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
			'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	var aSem = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi',
			'Vendredi', 'Samedi');
	// Selon le format demandé
	switch (fmt) {
	case 1:
		iMois++;
		return ajoutZero(iJour) + '/' + ajoutZero(iMois) + '/'
				+ iAnnee.toString();
	case 2:
		iMois++;
		return iAnnee.toString() + '-' + ajoutZero(iMois) + '-'
				+ ajoutZero(iJour);
	case 3:
		return aSem[iSem] + ' ' + iJour.toString() + ' ' + aMois[iMois] + ' '
				+ iAnnee.toString();
	default:
		return oDJ.toString();
	}
};

ajoutZero = function(nb) {
	if (nb < 10) {
		return '0' + nb.toString();
	} else {
		return nb.toString();
	}
};

convertTTC = function(ht, taux) {
	return ht * (1 + taux);
};
