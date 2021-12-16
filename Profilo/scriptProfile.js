/* ------   show_profile.php   --------- */

// gestione del cambio di immagine

sceltaSesso = document.getElementsByName("sesso");

for (i = 0; i < sceltaSesso.length; i++) 
{
  sceltaSesso[i].addEventListener('click', function (event) 
  {
    if (event.target && event.target.matches("input[type='radio']")) 
    {
      // cambio in tempo reale dell'immagine di profilo in base al sesso
      if (document.getElementById("maschio").checked) {
        document.getElementById("ImmagineProfilo").src = "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person13-1024.png";
      }

      else if (document.getElementById("femmina").checked) {
        document.getElementById("ImmagineProfilo").src = "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person12-1024.png";
      }
      
      else {
        document.getElementById("ImmagineProfilo").src = "https://cdn4.iconfinder.com/data/icons/light-ui-icon-set-1/130/avatar_2-1024.png";
      }
    }
  });
}