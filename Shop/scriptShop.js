/* ------   shop.php   --------- */

// cancello il bordo dell'elemento non piu' attivo
function cancelBorder(item, index) {
  if(item.tagName === "DIV") item.style.border = "0px";
}

// cambio del colore

colori = document.getElementById("colori");
bracImg = document.getElementById("bracImg");
card = document.getElementById("card");
// buyBtn = document.getElementById("buyBtn");

colori.addEventListener("click", function (event) 
{
  // cambio il bordo del selezionato
  if(event.target.parentElement.id == "colori")
  {
    document.getElementById("colori").childNodes.forEach(cancelBorder);
    event.target.style.border = "3px solid black";

    style = getComputedStyle(event.target)

    if(style.backgroundColor == "rgb(233, 137, 59)") // arancione
    {
      bracImg.src = "../Immagini/ImmaginiShop/arancione.png";
      card.style.backgroundColor = "rgb(233, 137, 59)";
    }
    else if(style.backgroundColor == "rgb(160, 231, 249)") // azzurro
    {
      bracImg.src = "../Immagini/ImmaginiShop/azzuro.png";
      card.style.backgroundColor = "rgb(160, 231, 249)";
    }
    else if(style.backgroundColor == "rgb(253, 251, 91)") // giallo
    {
      bracImg.src = "../Immagini/ImmaginiShop/giallo.png";
      card.style.backgroundColor = "rgb(253, 251, 91)";
    }
    else if(style.backgroundColor == "rgb(254, 138, 172)") // rosa
    {
      bracImg.src = "../Immagini/ImmaginiShop/rosa.png";
      card.style.backgroundColor = "rgb(254, 138, 172)";
    }
    else if(style.backgroundColor == "rgb(102, 163, 59)")// verde
    {
      bracImg.src = "../Immagini/ImmaginiShop/verde.png";
      card.style.backgroundColor = "rgb(102, 163, 59)";
    }
  }
});