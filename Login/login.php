<!DOCTYPE html>
<html lang="it">
<head>
    <title>Login</title>
</head>

<body>

<?php
	include("../Comuni/DB_connect.php");

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	session_start();

    if(empty($_POST)) {
        error_log($dateTime." -- Login -- Errore: dati non ricevuti\n", 3, $_SERVER["DOCUMENT_ROOT"]."/../log.txt");
        header("Location: login_form.php");	
        exit();
    }

    foreach ($_POST as $val) {
		if (!isset($val)) {
            error_log($dateTime." -- Login -- Errore: compilare tutti i campi richiesti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
            header("Location: login_form.php");	
            exit();
        }

        if (empty($val)){
            error_log($dateTime." -- Login -- Errore: non possono essere presenti campi vuoti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
            header("Location: login_form.php");
            exit();
        }
	}

    $email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		error_log($dateTime." -- Login -- Error: formato email non valido\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: login_form.php");
        exit();
	}

    $password= trim($_POST["pass"]);

    //Ottengo dati dell'utente da DB tramite prepared statement
    $stmt = mysqli_prepare($con, "SELECT firstname, lastname, email, pass FROM utenti WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    //Effettuo nuovamente controllo email e password corrette, già fatto lato client con api-fetch
    //Controllo ripetuto in caso di accesso diretto a file login.php (senza passare dal form)
    //Controllo che il risultato della query sia una sola riga
    if (mysqli_num_rows($res)!=1) {
        error_log($dateTime." -- Login -- Error: restituite più righe associate ad una mail\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: login_form.php");
        exit();
    }

	//Controllo che la password sia corretta
	if(!password_verify($password, $row["pass"])) {
		error_log($dateTime." -- Login -- Error: email o password non corretti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: login_form.php");
        exit();
    }

	$_SESSION["login"]= "yes";
	$_SESSION["firstname"] = $row["firstname"];
	$_SESSION["lastname"] = $row["lastname"];
	$_SESSION["email"] = $row["email"];
	
	mysqli_close($con);
	header("Location: ../Home/home.php");
	exit();
?>

</body>
</html>