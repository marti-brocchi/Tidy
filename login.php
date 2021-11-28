<!DOCTYPE html>
<html lang="it">
<head>
    <title>Login</title>
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

	session_start();

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

    $email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		exit();
	}

    $password= trim($_POST["pass"]);

    //Ottengo hash password dell'utente da DB tramite prepared statement
    $stmt = mysqli_prepare($con, "SELECT firstname, lastname, email, pass FROM utenti WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    //Controllo che il risultato della query sia una sola riga
    if (mysqli_num_rows($res)!=1) {
        echo "<h1>Errore: email o password non corretti</h1>";
		header("Refresh:5; url=login_form.php");
		exit();
    }

	//Controllo che la password sia corretta
	if(!password_verify($password, $row["pass"])) {
		echo "<h1>Errore: email o password non corretti</h1>";
		header("Refresh:5; url=change_password.php");
		exit();
    }

	$_SESSION["login"]= "yes";
	$_SESSION["firstname"] = $row["firstname"];
	$_SESSION["lastname"] = $row["lastname"];
	$_SESSION["email"] = $row["email"];
	
	mysqli_close($con);
	header("Location: homepage.php");
	exit();
?>

</body>
</html>
