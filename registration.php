<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
	/****************************************************************************/
	/* TO BE DONE                                                               */
	/*                                                                          */
	/* This means: reading the data sent in POST, "cleaning" them, verifying    */
	/* that the user sent what you expect, writing data in the file             */
	/*                                                                          */
    	/* If something goes wrong send back appropriate messages                   */
	/****************************************************************************/

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
	
	$firstname = test_input($_POST["firstname"]);
	$lastname = test_input($_POST["lastname"]);
	
	// 2. Controllo che la mail inserita sia valida
	$email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	$password = test_input($_POST["pass"]);
	$confirm = test_input($_POST["confirm"]);


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
	$line = $firstname ."|". $lastname ."|". $email ."|". $hash; 
	
	//Apertura file e scrittura dati
	$fp=fopen($filename,"a");
	flock($fp, LOCK_EX);
	fwrite($fp, $line);
	flock($fp, LOCK_UN);
	fclose($fp);

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// e poi vado alla pagina di login
	header("Location: login_form.php");

?>

</body>
</html>
