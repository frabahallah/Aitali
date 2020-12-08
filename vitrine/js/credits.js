window.onload = function() {
	// alert('Hello World!');
	// ajoutCodeHTML();
	ajoutCodeDOM();
};

// Ajout dans le document via code HTML
function ajoutCodeHTML() {
	document.write('<h1>Crédits</h1>');
	document.write('<h2>Copyright</h2>');
}

// Ajout dans le document via DOM
function ajoutCodeDOM() {
	// Titre 1
	var txt1 = document.createTextNode('Crédits');
	var h1 = document.createElement('h1');
	h1.appendChild(txt1);
	document.body.appendChild(h1);
	// Titre 2
	var txt2 = document.createTextNode('Copyright');
	var h2 = document.createElement('h2');
	h2.appendChild(txt2);
	document.body.appendChild(h2);
	// Liste des modules et du nombre de lignes
	var oUl = document.createElement('ul');
	var oTxt, oLi;
	for (i = 1; i < 11; i++) {
		oTxt = document.createTextNode('Module ' + i + ' : '
				+ Math.round(Math.random() * 1000) + ' lignes de code ');
		oLi = document.createElement('li');
		oLi.appendChild(oTxt);
		oUl.appendChild(oLi);
	}
	document.body.appendChild(oUl);
}
