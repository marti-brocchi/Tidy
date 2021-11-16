<?php 
  session_start();

  // se non c'è sessione, reindirizza al login
  if (!(isset($_SESSION["login"]))) header("Location: login_form.php");

  include("Comuni/DB_connect.php");

  // costruisco una query che restituisce i dati associati all'utente con quella mail
  // utenti.firstname, utenti.lastname, utenti.DataDiNascita, utenti.Telefono, utenti.Stato, utenti.Provincia, utenti.Citta, utenti.Indirizzo, utenti.CAP
  
  $update_query = "UPDATE utenti
  SET firstname = '".$_POST["firstname"]."', lastname = '".$_POST["lastname"]."', 
  dataDiNascita = '".$_POST["dataDiNascita"]."', telefono = '".$_POST["telefono"]."', 
  stato	= '".$_POST["stato"]."', provincia = '".$_POST["provincia"]."',
  citta = '".$_POST["citta"]."', indirizzo = '".$_POST["indirizzo"]."',
  CAP = '".$_POST["CAP"]."' WHERE email = '".$_POST["email"]."';";

  echo $update_query; // DEBUG

  // eseguo la query
  //$result = mysqli_query($con, $update_query);

  //echo "<br>Result: ".$result;

  if (mysqli_query($con, $update_query)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }

  /* controllo che tutto sia andato a buon fine
  if(!($result))
  {
    echo "<h1> Qualcosa è andato storto :( </h1>";
    exit();
  }*/

  mysqli_close($con);

  header("Location: show_profile.php");

?>