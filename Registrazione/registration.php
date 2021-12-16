<!DOCTYPE html>
<html lang="it">
<head>
    <title>Registrazione</title>
</head>

<body>
	<?php
		date_default_timezone_get();
		$dateTime = date('m/d/Y h:i:s a', time());

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if(empty($_POST)) {
			error_log($dateTime." -- Registrazione -- Errore: dati non ricevuti\n", 3, $_SERVER["DOCUMENT_ROOT"]."/../log.txt");
			header("Location: registration_form.php");	
			exit();
		}

		foreach ($_POST as $val) {
			if (!isset($val)) {
				error_log($dateTime." -- Registrazione -- Errore: compilare tutti i campi richiesti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
				header("Location: registration_form.php");	
				exit();
			}

			if (empty($val)){
				error_log($dateTime." -- Registrazione -- Errore: non possono essere presenti campi vuoti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
				header("Location: registration_form.php");
				exit();
			}
		}
		
		$firstname = test_input($_POST["firstname"]);
		$lastname = test_input($_POST["lastname"]);
		
		$email = test_input($_POST["email"]);
		if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
			error_log($dateTime." -- Registrazione -- Error: formato email non valido\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
			header("Location: registration_form.php");
			exit();
		}

		$password = trim($_POST["pass"]);
		$confirm = trim($_POST["confirm"]);

		if (strcmp($password, $confirm)!=0) {
			error_log($dateTime." -- Registrazione -- Errore: le password non coincidono\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
			header("Location: registration_form.php");
			exit();
		}
		
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$stmt = mysqli_prepare($con, "INSERT INTO utenti (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $hash);
		mysqli_stmt_execute($stmt);

		if (mysqli_affected_rows($con)==0){
			error_log($dateTime." -- Registrazione -- Errore: esiste già un account associato a questa mail\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
			header("Location: registration_form.php");
			exit();
		}

		mysqli_stmt_close($stmt);
		mysqli_close($con);
		header("Location: ../Login/login_form.php");
	?>
</body>
</html>