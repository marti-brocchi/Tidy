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

	// Funzione che esegue diversi controlli sui dati in input
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$filename = $_SERVER['DOCUMENT_ROOT']."/../users.txt";

	/* --- 	CONTROLLI 	--- */

	// 1. Controllo che tutti i campi siano stati compilati
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
	
	// effettuo, oltre ai controlli di base, anche un escaping per i dati in input al DB
	$firstname = mysqli_real_escape_string($con, test_input($_POST["firstname"]));
	$lastname = mysqli_real_escape_string($con, test_input($_POST["lastname"]));
	
	// 2. Controllo che la mail inserita sia valida
	$email = mysqli_real_escape_string($con, test_input($_POST["email"]));
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	$password = $_POST["pass"];
	$confirm = $_POST["confirm"];

	// 3. Controllo che le password non siano uguali
	if (strcmp($password, $confirm)!=0) {
		echo "<h1>Errore: le password non coincidono</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	// 4. Controllo che non esista già un account associato a quella mail
	// se l'account esiste già imposta $alreadyExists a true:
	$alreadyExists = false;

	if(file_exists($filename))
	{
		if (!$reader = fopen($filename, 'r'))
		{
				echo "Cannot open file ($filename)";
				exit;
		}

		while(!feof($reader) && !$alreadyExists)
		{
				$content = fgets($reader)."<br>";

				// se trovo la mail di login nel file
				if(strpos($content, $email) != false)
				{
						// dico che la mail esiste già
						$alreadyExists = true;
				}
		}

		// se esiste già quell'account ($alreadyExists)
		if($alreadyExists)
		{
				// stampa errore
				echo "<h1> Questa mail ha già un account associato.<br> </h1>";
				exit;
		}
	}
	
	/* Se tutto va a buon fine, scrivo i dati e la password cifrata */
	$hash = password_hash($password, PASSWORD_DEFAULT);

	// preparo la query
	$insert_query = "INSERT INTO utenti (id, firstname, lastname, email, pass)
										VALUES (NULL, '".$firstname."', '".$lastname."', '".$email."', '".$hash."');"; 

	// eseguo la query
	if(!mysqli_query($con, $insert_query))
	{
		echo "<h1> Qualcosa è andato storto :( </h1>";
    exit();
	}

	// e poi vado alla pagina di login
	header("Location: login_form.php");

?>

</body>
</html>
