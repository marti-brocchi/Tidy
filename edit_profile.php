<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifica profilo</title>
</head>

<body>

<?php 
    include("Comuni/DB_connect.php");

    // se non c'è sessione, reindirizza al login
    if (!(isset($_SESSION["login"]))) header("Location: login_form.php");

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

    echo $firstname. "/". $lastname. "/". $dataDiNascita. "/". $telefono. "/". $stato. "/". $provincia. "/". $citta. "/". $indirizzo. "/". $cap;

    // costruisco una query che restituisce i dati associati all'utente con quella mail
    // utenti.firstname, utenti.lastname, utenti.DataDiNascita, utenti.Telefono, utenti.Stato, utenti.Provincia, utenti.Citta, utenti.Indirizzo, utenti.CAP
    $stmt = mysqli_prepare($con, "UPDATE utenti SET firstname = ?, lastname = ?, dataDiNascita = ?, telefono = ?, stato = ?, provincia = ?, citta = ?, indirizzo = ?, CAP = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $firstname, $lastname, $dataDiNascita, $telefono, $stato, $provincia, $citta, $indirizzo, $cap, $_SESSION["email"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if (mysqli_affected_rows($con)==0){
        echo "<h1>Errore: update non eseguito</h1>";
        header("Refresh:5; url=show_profile.php");
        exit();
    }

    mysqli_close($con);
    header("Location: show_profile.php");

?>

</body>
</html>