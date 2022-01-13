<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifica profilo</title>
</head>

<body>

<?php 
    include("../Comuni/DB_connect.php");

    // se non c'è sessione, reindirizza al login
    if (!(isset($_SESSION["login"]))) header("Location: ../Login/login_form.php");

    function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    $firstname = isset($_POST["firstname"]) ? test_input($_POST["firstname"]) : "";
    $lastname = isset($_POST["lastname"]) ? test_input($_POST["lastname"]) : "";
    $dataDiNascita = isset($_POST["dataDiNascita"]) ? test_input($_POST["dataDiNascita"]) : "";
    $telefono = isset($_POST["telefono"]) ? test_input($_POST["telefono"]) : "";
    $stato = isset($_POST["stato"]) ? test_input($_POST["stato"]) : "";
    $provincia = isset($_POST["provincia"]) ? test_input($_POST["provincia"]) : "";
    $citta = isset($_POST["citta"]) ? test_input($_POST["citta"]) : "";
    $indirizzo = isset($_POST["indirizzo"]) ? test_input($_POST["indirizzo"]) : "";
    $cap = isset($_POST["CAP"]) ? test_input($_POST["CAP"]) : "";
    $sesso = isset($_POST["sesso"]) ? test_input($_POST["sesso"]) : "";

    //costruisco una query per ottenere id utente
    $stmt = mysqli_prepare($con, "SELECT id FROM utenti WHERE email=?");
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["email"]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res); 
    mysqli_stmt_close($stmt);

    if (mysqli_num_rows($res)==0) {
        error_log($dateTime." -- Profilo -- Error: nessuna riga associata alla mail\n", 3, "../../log.txt");
        header("Location: ../Profilo/show_profile.php");
        exit();
    }

    if (mysqli_num_rows($res)>1) {
        error_log($dateTime." -- Profilo -- Error: restituite più righe associate ad una mail\n", 3, "../../log.txt");
        header("Location: ../Profilo/show_profile.php");
        exit();
    }

    // costruisco una query che aggiorna i dati associati all'utente con quella mail
    // utenti.firstname, utenti.lastname
    $stmt = mysqli_prepare($con, "UPDATE utenti SET firstname = ?, lastname = ? WHERE email = ?");
    if(!$stmt)
    {
        die("errore mysqli: ".mysqli_error($con));
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $_SESSION["email"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if (mysqli_affected_rows($con)==0){
        error_log($dateTime." -- Profilo -- Error: update non eseguito\n", 3, "../../log.txt");
        header("Location: ../Profilo/show_profile.php");
        exit();
    }

    //Controllo se esiste all'interno della tabella info_utenti una riga già associata all'utente
    $stmt = mysqli_prepare($con, "SELECT * FROM info_utenti WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'i', $row["id"]);
    mysqli_stmt_execute($stmt);
    $res2 = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    //Se non esiste inserisco nuovi valori id, dataDiNascita, telefono, stato, provincia, citta, indirizzo, CAP, sesso
    if (mysqli_num_rows($res2)==0) {
        $stmt = mysqli_prepare($con, "INSERT INTO info_utenti VALUES (id=?, dataDiNascita = ?, telefono = ?, stato = ?, provincia = ?, citta = ?, indirizzo = ?, CAP = ?, sesso = ?)");
        if(!$stmt)
        {
            die("errore mysqli: ".mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, "issssssss", $row["id"], $dataDiNascita, $telefono, $stato, $provincia, $citta, $indirizzo, $cap, $sesso);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    //Altrimenti se esiste aggiorno i valori
    else {
        $stmt = mysqli_prepare($con, "UPDATE info_utenti SET dataDiNascita = ?, telefono = ?, stato = ?, provincia = ?, citta = ?, indirizzo = ?, CAP = ?, sesso = ? WHERE id = ?");
        if(!$stmt)
        {
            die("errore mysqli: ".mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, "ssssssssi", $dataDiNascita, $telefono, $stato, $provincia, $citta, $indirizzo, $cap, $sesso, $row["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    if (mysqli_affected_rows($con)==0){
        error_log($dateTime." -- Profilo -- Error: update non eseguito\n", 3, "../../log.txt");
        header("Location: ../Profilo/show_profile.php");
        exit();
    }

    mysqli_close($con);
    header("Location: show_profile.php");
?>

</body>
</html>