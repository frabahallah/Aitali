// Variables objet globales
var oSaveCookie = document.getElementById('save1');

// Gestion des événements
createContact = function() {
	var oContact = {};
	var aElts = document.querySelectorAll('form>*[name]');
	for (var i = 0; i < aElts.length; i++) {
		oContact[aElts[i].name] = aElts[i].value;
	}
	return JSON.stringify(oContact);
};

oSaveCookie.onclick = function() {
	saveCookie('contact', createContact(), 7);
	var iRep = window.confirm('Veux-tu voir le résultat ?');
	if (iRep) {
		var sContact = readCookie('contact');
		var oContact = JSON.parse(sContact);
		var sMsg = new String();
		for (sCle in oContact) {
			sMsg += sCle + ' : ' + oContact[sCle] + '\n';
		}
		alert(sMsg);
	}
};

window.onload = function() {
	navigator.geolocation.getCurrentPosition(onsuccess, onerror);
};

onsuccess = function(e) {
	var oMap = document.getElementById('myMap');
	oMap.innerHTML = 'Latitude : ' + e.coords.latitude + '<br>';
	oMap.innerHTML += 'Longitude : ' + e.coords.longitude + '<br>';
	oMap.innerHTML += 'Altitude : ' + e.coords.altitude + '<br>';
	var oCenter = new google.maps.LatLng(e.coords.latitude, e.coords.longitude);
	var oOptions = {
		zoom : 14,
		center : oCenter,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	// SATELLITE, HYBRID
	};
	var myMap = new google.maps.Map(oMap, oOptions);
};

onerror = function(e) {
	// alert(e.message);
};
