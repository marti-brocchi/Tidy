<!DOCTYPE html>
<html lang="it">
<head>
	<title> Tidy - Registrazione </title>
	<link rel="stylesheet" type="text/css" href="../Comuni/style.css" />
    <link rel="stylesheet" type="text/css" href="../Comuni/form-style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
    <?php include("../Comuni/header.php"); ?>

    <section class="register" id="register">
        <div class="container">
            <div class="row h-100 align-items-center align-content-center">
                <form class="form" action="registration.php" method="post">
                    <fieldset class="fieldset">
                        <legend class="legend"> <h1>Registrati </h1> </legend>
                    
                        <i class="far fa-user"></i>
                        <label for="firstname">Nome</label> <br>
                        <input class="user-data" type="text" id="firstname" name="firstname" placeholder="Inserisci nome" required> <br><br>

                        <i class="far fa-user"></i>
                        <label for="lastname">Cognome</label> <br>
                        <input class="user-data" type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required> <br><br>

                        <i class="far fa-envelope"></i>
                        <label for="email">E-mail</label> <br>
                        <input class="user-data" type="email" id="email" name="email" placeholder="Inserisci email" required>
                        <div id="mesEmail"></div><br>

                        <i class="fas fa-key"></i>
                        <label for="pass">Password</label> <br>
                        <input class="user-data" type="password" id="pass" name="pass" placeholder="Inserisci password" required> 
                        <div id="mesPassRegistration"></div><br>

                        <i class="fas fa-key"></i>
                        <label for="confirm">Conferma password</label> <br>
                        <input class="user-data" type="password" id="confirm" name="confirm" placeholder="Inserisci password" required>
                        <div id="mesConfRegistration"></div>
                    </fieldset>
                    <br><br>
                    <input type="submit" id="submitRegistration" name="submit" value="Invia">
                </form>
            </div>
        </div>
    </section>
    
	<?php include("../Comuni/footer.php"); ?>
	<script src="scriptRegistration.js"> </script>
</body>
</html>

