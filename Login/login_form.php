<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Login</title>
    <link rel="stylesheet" type="text/css" href="../Comuni/style.css" />
    <link rel="stylesheet" type="text/css" href="../Comuni/form-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../Immagini/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../Immagini/favicon.ico" type="image/x-icon">
</head>

<body>
        <?php
            //Controllo sessione: non dovrebbe esistere perché l'utente loggato non dovrebbe andare alla pagina login
            session_start(); // recupera la sessione esistente

            /* Chiudo la sessione e rimando alla pagina di login */
            $_SESSION = array();
            setcookie(session_name(),'',time() - 42000); //Cancello cookie di sessione
            session_destroy();

            include("../Comuni/header.php");
        ?>

        <section class="register" id="register">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <form action="login.php" method="post">
                        <fieldset class="fieldset">
                            <legend class="legend"><h1> Login </h1></legend>
                            <i class="far fa-envelope"></i>
                            <label for="email">E-mail</label> <br>
                            <input class="user-data" type="email" id="email" name="email" placeholder="Inserisci email" required> <br><br>

                            <i class="fas fa-key"></i>
                            <label for="pass">Password</label> <br>
                            <input class="user-data" type="password" id="pass" name="pass" placeholder="Inserisci password" required> <br><br>
                        </fieldset>
                        <br><br>
                        <input class="button" type="submit" name="submit" value="Invia">
                    </form>
                </div>
            </div>
        </section>
	
	<?php include("../Comuni/footer.php"); ?>
</body>
</html>