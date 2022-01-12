/* ------   shop.php   --------- */

// cambio del colore

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
      }
      else if(style.backgroundColor == "rgb(160, 231, 249)") // azzurro
      {
        bracImg.src = "../Immagini/ImmaginiShop/azzurro.png";
        brac.style.backgroundColor = "rgb(160, 231, 249)";
      }
      else if(style.backgroundColor == "rgb(253, 251, 91)") // giallo
      {
        bracImg.src = "../Immagini/ImmaginiShop/giallo.png";
        brac.style.backgroundColor = "rgb(253, 251, 91)";
      }
      else if(style.backgroundColor == "rgb(254, 138, 172)") // rosa
      {
        bracImg.src = "../Immagini/ImmaginiShop/rosa.png";
        brac.style.backgroundColor = "rgb(254, 138, 172)";
      }
      else if(style.backgroundColor == "rgb(102, 163, 59)")// verde
      {
        bracImg.src = "../Immagini/ImmaginiShop/verde.png";
        brac.style.backgroundColor = "rgb(102, 163, 59)";
      }
    }
  });
}