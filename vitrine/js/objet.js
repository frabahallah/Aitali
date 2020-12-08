var i = 0;
var bool = true;
var string = 'Hello World!';
var uneDate = new Date();
var tableau = new Array('sur', 'image');

var contact = {};
contact.nom = 'lesly';
contact.age = 52;

var adresse = {};
adresse.rue = '1 rue toto';
adresse.cp = '75002';
adresse.ville = 'Paris';

contact.adresse = adresse;
console.log(contact);

var contact2 = {};
contact2['nom'] = 'Momo';
contact2['age'] = 30;
contact2['sexe'] = 'M';
contact2['celib'] = true;
contact2['maj'] = new Date();
console.log(contact2);

var sMomo = JSON.stringify(contact2);
console.log(sMomo);
