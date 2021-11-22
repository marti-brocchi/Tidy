<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifica password</title>
</head>

<body>

<?php
    include("Comuni/DB_connect.php");

    if(!isset($_SESSION["login"])) {
        header("Location: login_form.php");
        exit();
    }

	foreach ($_POST as &$val) {
		if (!isset($val)) {
			echo "<h1>Errore: compilare tutti i campi richiesti</h1>";
			header("Refresh:5; url=change_password.php");
			exit();
		}

		if (empty($val)){
			echo "<h1>Errore: non possono essere presenti campi vuoti</h1>";
			header("Refresh:5; url=change_password.php");
			exit();
		}
	}
	
	$oldPassword = trim($_POST["oldpass"]);
    $password = trim($_POST["pass"]);
	$confirm = trim($_POST["confirm"]);

    //Controllo che nuova password e conferma coincidano
	if (strcmp($password, $confirm)!=0) {
		echo "<h1>Errore: password e conferma non coincidono</h1>";
		header("Refresh:5; url=change_password.php");
		exit();
	}

    //Ottengo hash vecchia password dell'utente da DB tramite prepared statement
    $stmt = mysqli_prepare($con, "SELECT pass FROM utenti WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["email"]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    //Controllo che il risultato della query sia una sola riga
    if (mysqli_num_rows($res)!=1) {
        echo "<h1>Qualcosa è andato storto :(</h1>";
		header("Refresh:5; url=change_password.php");
		exit();
    }

    //Controllo che la vecchia password sia corretta
    if(!password_verify($oldPassword, $row["pass"])) {
        echo "<h1>Errore: vecchia password non corretta</h1>";
        header("Refresh:5; url=change_password.php");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
	
    //Settare nuova pass su DB
    $newstmt = mysqli_prepare($con, "UPDATE utenti SET pass=? WHERE email=?");
    mysqli_stmt_bind_param($newstmt, 'ss', $hash, $_SESSION["email"]);
    mysqli_stmt_execute($newstmt);
    mysqli_stmt_close($newstmt);

    if (mysqli_affected_rows($con)==0){
        echo "<h1>Errore: update non eseguito</h1>";
        header("Refresh:5; url=change_password.php");
        exit();
    }

    mysqli_close($con);
	header("Location: show_profile.php");
?>

</body>
</html>
