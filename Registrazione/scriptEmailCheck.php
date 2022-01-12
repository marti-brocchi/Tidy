<?php
	include("../Comuni/DB_connect.php");

  /* SE LA MAIL ESISTE GIA', LO SCRIPT TORNA FALSE */
  $email = $_GET["email"];

  $stmt = mysqli_prepare($con, "SELECT firstname, lastname, email, pass FROM utenti WHERE email=?");
  mysqli_stmt_bind_param($stmt, 's', $email);
  mysqli_stmt_execute($stmt);

  $res = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  // Se la mail esiste già il risultato sarà composto da una (o piu') righe
  // e ritorno false; se va tutto bene lo script torna true
  if(mysqli_num_rows($res) != 0)
    echo "false";
  else
    echo "true";
?>