<!DOCTYPE html>
<html lang="it">
<head>
    <title>Log-out</title>
</head>

<body>

<?php
    session_start(); // recupera la sessione esistente

    /* Chiudo la sessione e rimando alla homepage */
    $_SESSION = array();
    setcookie(session_name(),'',time() - 42000); //Cancello cookie di sessione
    session_destroy(); 

    header("Location: homepage.php");
?>

</body>
</html>
