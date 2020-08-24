// sélectionner les input de selection les mettre non griser selon la selection

// DECLARATION DES VARIABLES POUR RECUPERER LES ID DU SELECTLIEU

var selectElem = document.getElementById('selectlieu');
var boxurl = document.getElementById('boxurl');
var inputAddress = document.getElementById('inputAddress');
var inputVille = document.getElementById('inputVille');
var inputCP = document.getElementById('inputCP');


console.log(boxurl);

// FONCTION POUR GRISER LES CHAMPS SELON LE CHOIX 
// Quand une nouvelle <option> est selectionnée
selectElem.addEventListener('change', function() {
  // si cette option est égale à la valeur boutique
  if (this.value == "boutique") {
      // alors on ajoute l'attribut disabled
    boxurl.setAttribute("disabled", "");
  }
  else {
    // sinon on enlève l'attribut disabled pour url et on ajoute pour les autres
    boxurl.removeAttribute("disabled");
    inputAddress.setAttribute("disabled", "");
    inputVille.setAttribute("disabled", "");
    inputCP.setAttribute("disabled", "");
    }
});

// tentative label formulaire labelFile
function labelFile(file){
  const txtLabelfile = document.getElementById('ticket');
  txtLabelfile.innerText = file[0].name;


}

