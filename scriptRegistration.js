/* ------   registration_form.php   --------- */

// controllo che le password coincidano

passElement = document.getElementById("pass");
confirmElement = document.getElementById("confirm");
mesConfRegistration = document.getElementById("mesConfRegistration");

var passMatch = false;

confirmElement.addEventListener("keyup", function (event) 
{
  if (passElement.value == confirmElement.value)
  {
    mesConfRegistration.style.color = "green";
    mesConfRegistration.innerHTML = "Le Password Coincidono";
    passMatch = true;
  } 
  else 
  {
    mesConfRegistration.style.color = "red";
    mesConfRegistration.innerHTML = "Le Password Non Coincidono";
    passMatch = false;
  }
});

// prima di invicare i dati
// controllo che la password sia lunga almeno 8 caratteri e che le password coincidano
submitRegistration = document.getElementById("submitRegistration");
mesPassRegistration = document.getElementById("mesPassRegistration");

submitRegistration.addEventListener("click", function (event) 
{
  passLongEnough = (passElement.value.length >= 8);

  if(!passLongEnough)
  {
    mesPassRegistration.style.color = "red";
    mesPassRegistration.innerHTML = "La Password deve essere lunga almeno 8 caratteri";
  }

  if(!passLongEnough || !passMatch) event.preventDefault();
});
