<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
	// mi connetto al DB
	include("Comuni/DB_connect.php");
?>

<?php
	// funzione per sanificare i dati in input
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// inizia una sessione
	session_start();

  foreach ($_POST as &$val) {
		if (!isset($val)) {
			echo "<h1>Errore: compilare tutti i campi richiesti</h1>";
			header("Refresh:5; url=registration_form.php");
			return;
		}

		if (empty($val)){
			echo "<h1>Errore: non possono essere presenti campi vuoti</h1>";
			header("Refresh:5; url=registration_form.php");
			return;
		}
	}

  $email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	/* Acquisizione dei dati corrispondenti all'e-mail */

	// costruisco una query che restituisce i dati associati all'utente con quella mail
	$select_query = "SELECT * FROM utenti
										WHERE email = '".$email."';"; 

	// eseguo la query
	$result = mysqli_query($con, $select_query);

	// controllo che tutto sia andato a buon fine
	if(!($result))
	{
		echo "<h1> Qualcosa è andato storto :( </h1>";
		exit();
	}

	// creo un array associativo
	$user_data = mysqli_fetch_assoc($result);

	// se tutto è andato a buon fine inseriesco in $hash la password che è presente nel DB
	$hash = $user_data["pass"];

	// posso quindi procedere a verificare la password 
  if(!password_verify($password, $hash)) {
    echo "<h1>Errore: email o password errati</h1>";
    header("Refresh:5; url=login_form.php");
    return;
  }
	else{
		// inizializza le variabili di sessione
		$_SESSION["login"] = "yes";
		$_SESSION["firstname"] = $user_data["firstname"];
		$_SESSION["lastname"] = $user_data["lastname"];
		$_SESSION["email"] = $user_data["email"];
		
		// reindirizza alla homepage
		header("Location: homepage.php");
	}
?>

</body>
</html>
