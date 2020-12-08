window.onload = function() {
	var i = localStorage.length;
	var oH2, oPar, oVal;
	while (i--) {
		oH2 = document.createElement('h2');
		oH2.innerHTML = localStorage.key(i);
		document.body.appendChild(oH2);
		oVal = JSON.parse(localStorage.getItem(localStorage.key(i)));
		console.log(oVal);
		for (key in oVal) {
			oPar = document.createElement('p');
			oPar.innerHTML = oVal[key];
			document.body.appendChild(oPar);
		}
	}
};