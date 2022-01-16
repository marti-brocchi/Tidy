/* ------   shop.php   --------- */

// questa funzione mi serve per pre-caricare le immagini in modo da visualizzarle velocemente nel cambio di colore
function preloadImages(array) {
  if (!preloadImages.list) {
      preloadImages.list = [];
  }
  var list = preloadImages.list;
  for (var i = 0; i < array.length; i++) {
      var img = new Image();
      img.onload = function() {
          var index = list.indexOf(this);
          if (index !== -1) {
              // remove image from the array once it's loaded
              // for memory consumption reasons
              list.splice(index, 1);
          }
      }
      list.push(img);
      img.src = array[i];
  }
}

preloadImages([ "../Immagini/ImmaginiShop/arancione.png", 
                "../Immagini/ImmaginiShop/azzurro.png", 
                "../Immagini/ImmaginiShop/giallo.png", 
                "../Immagini/ImmaginiShop/rosa.png", 
                "../Immagini/ImmaginiShop/verde.png"]);

// cambio del colore
var selected = "azzurro"; // indica il colore attualmente selezionato

colori = document.getElementsByClassName("colorCont");
bracImg = document.getElementById("bracImg");
brac = document.getElementById("brac");

for(i=0; i<5; i++)
{
  colori[i].addEventListener("click", function (event) 
  {
    // cambio il bordo del selezionato
    if(event.target.localName == "span" || event.target.localName == "label")
    {
      // document.getElementById("colori").childNodes.forEach(cancelBorder);
      // event.target.style.border = "3px solid black";

      if(event.target.localName == "span") style = getComputedStyle(event.target);
      else style = getComputedStyle(event.target.childNodes[3]);

      if(style.backgroundColor == "rgb(233, 137, 59)") // arancione
      {
        bracImg.src = "../Immagini/ImmaginiShop/arancione.png";
        brac.style.backgroundColor = "rgb(233, 137, 59)";
        selected = "arancione";
      }
      else if(style.backgroundColor == "rgb(160, 231, 249)") // azzurro
      {
        bracImg.src = "../Immagini/ImmaginiShop/azzurro.png";
        brac.style.backgroundColor = "rgb(160, 231, 249)";
        selected = "azzurro";
      }
      else if(style.backgroundColor == "rgb(253, 251, 91)") // giallo
      {
        bracImg.src = "../Immagini/ImmaginiShop/giallo.png";
        brac.style.backgroundColor = "rgb(253, 251, 91)";
        selected = "giallo";
      }
      else if(style.backgroundColor == "rgb(254, 138, 172)") // rosa
      {
        bracImg.src = "../Immagini/ImmaginiShop/rosa.png";
        brac.style.backgroundColor = "rgb(254, 138, 172)";
        selected = "rosa";
      }
      else if(style.backgroundColor == "rgb(102, 163, 59)")// verde
      {
        bracImg.src = "../Immagini/ImmaginiShop/verde.png";
        brac.style.backgroundColor = "rgb(102, 163, 59)";
        selected = "verde";
      }
    }
  });
}

inputRadios = document.getElementsByName("colore");
// gestione di un piccolo bug: 
// controllo la sincronia tra colori e radio selezionato al caricamento della pagina
window.addEventListener('load', function (event) 
{
  for(i=0; i<inputRadios.length; i++){
    if(inputRadios[i].checked){
      bracImg.src = "../Immagini/ImmaginiShop/"+inputRadios[i].value+".png";
      selected = inputRadios[i].value;

      style = getComputedStyle(inputRadios[i].nextElementSibling);
      brac.style.backgroundColor = style.backgroundColor;
    }
  }
});

// questa funzione mi serve per reindirizzare correttamente alla pagina dei bracciali
// inizializzando correttamente la richiesta in get (a seconda del colore selezionato)
function redToBracPage() {
  window.location.href = "bracelet.php?colore="+selected;
}