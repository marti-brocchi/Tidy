<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifica password</title>
</head>

<body>

<?php
    include("../Comuni/DB_connect.php");

    if(!isset($_SESSION["login"])) {
        header("Location: ../Login/login_form.php");
        exit();
    }

	if(empty($_POST)) {
        error_log($dateTime." -- Cambio password -- Errore: dati non ricevuti\n", 3, $_SERVER["DOCUMENT_ROOT"]."/../log.txt");
        header("Location: change_password.php");	
        exit();
    }

    foreach ($_POST as $val) {
		if (!isset($val)) {
            error_log($dateTime." -- Cambio password -- Errore: compilare tutti i campi richiesti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
            header("Location: change_password.php");	
            exit();
        }

        if (empty($val)){
            error_log($dateTime." -- Cambio password -- Errore: non possono essere presenti campi vuoti\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
            header("Location: change_password.php");
            exit();
        }
	}
	
	$oldPassword = trim($_POST["oldpass"]);
    $password = trim($_POST["pass"]);
	$confirm = trim($_POST["confirm"]);

    //Effettuo nuovamente controllo password coincidenti, già fatto lato client con api-fetch
    //Controllo ripetuto in caso di accesso diretto a file change_pass.php (senza passare dal form)
	if (strcmp($password, $confirm)!=0) {
		error_log($dateTime." -- Cambio password -- Errore: le password inserite non coincidono\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: change_password.php");
        exit();
	}

    //Effettuo nuovamente controllo vecchia password corretta, già fatto lato client con api-fetch
    //Controllo ripetuto in caso di accesso diretto a file change_pass.php (senza passare dal form)
    //Ottengo hash vecchia password dell'utente da DB tramite prepared statement
    $stmt = mysqli_prepare($con, "SELECT pass FROM utenti WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["email"]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    //Controllo che il risultato della query sia una sola riga
    if (mysqli_num_rows($res)!=1) {
        error_log($dateTime." -- Cambio password -- Errore: restituite più righe associate ad una mail\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: change_password.php");
        exit();
    }

    //Controllo che la vecchia password sia corretta
    if(!password_verify($oldPassword, $row["pass"])) {
        error_log($dateTime." -- Cambio password -- Errore: vecchia password non corretta\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: change_password.php");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
	
    //Settare nuova pass su DB
    $newstmt = mysqli_prepare($con, "UPDATE utenti SET pass=? WHERE email=?");
    mysqli_stmt_bind_param($newstmt, 'ss', $hash, $_SESSION["email"]);
    mysqli_stmt_execute($newstmt);
    mysqli_stmt_close($newstmt);

    if (mysqli_affected_rows($con)==0){
        error_log($dateTime." -- Cambio password -- Errore: update non eseguito\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
        header("Location: change_password.php");
        exit();
    }

    mysqli_close($con);
	header("Location: show_profile.php");
?>

</body>
</html>