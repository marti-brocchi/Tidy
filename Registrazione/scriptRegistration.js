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

// gestisco con API Fetch il controllo dinamico di esistenza dell'email
var emailIsOkay = false;

emailElement = document.getElementById("email");
emailElement.addEventListener("keyup", function (event)
{
  var email = document.getElementById("email").value;
  var res = document.getElementById("mesEmail");
  res.style.color = "red";

  fetch("scriptEmailCheck.php?email=" + email, {
    method: "GET",
    headers: { "Content-type": "application/x-www-form-urlencoded" },
  }
  ).then(function (response) {
    if (response.status == 200)
      return response.text();
  }
  ).then(function (result) {
    if(result == "false")
    {
      res.innerHTML = "La Mail inserita è già stata usata";
      emailIsOkay = false;
    }
    else
    {
      res.innerHTML = "";
      emailIsOkay = true;
    }
  } 
  );
});

// prima di inviare i dati
// controllo che:
// -- la password sia lunga almeno 8 caratteri
// -- le password coincidano
// -- l'email vada bene

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
  else
    mesPassRegistration.innerHTML = "";

  if(!passLongEnough || !passMatch || !emailIsOkay) event.preventDefault();
});