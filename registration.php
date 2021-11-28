<!DOCTYPE html>
<html lang="it">
<head>
    <title>Registrazione</title>
</head>

<body>

<?php
	include("Comuni/DB_connect.php");

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	foreach ($_POST as &$val) {
		if (!isset($val)) {
			echo "<h1>Errore: compilare tutti i campi richiesti</h1>";
			header("Refresh:5; url=registration_form.php");
			exit();
		}

		if (empty($val)){
			echo "<h1>Errore: non possono essere presenti campi vuoti</h1>";
			header("Refresh:5; url=registration_form.php");
			exit();
		}
	}
	
	$firstname = test_input($_POST["firstname"]);
	$lastname = test_input($_POST["lastname"]);
	
	$email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		exit();
	}

	$password = trim($_POST["pass"]);
	$confirm = trim($_POST["confirm"]);

	if (strcmp($password, $confirm)!=0) {
		echo "<h1>Errore: le password non coincidono</h1>";
		header("Refresh:5; url=registration_form.php");
		exit();
	}
	
	$hash = password_hash($password, PASSWORD_DEFAULT);

	$stmt = mysqli_prepare($con, "INSERT INTO utenti (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $hash);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($con)==0){
        echo "<h1>Errore: inserimento non eseguito</h1>";
        header("Refresh:5; url=registration_form.php");
        exit();
    }

    mysqli_stmt_close($stmt);
	mysqli_close($con);
	header("Location: login_form.php");
?>

</body>
</html>
