<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Modifica password</title>
    <link rel="stylesheet" type="text/css" href="../Comuni/style.css" />
    <link rel="stylesheet" type="text/css" href="../Comuni/form-style.css" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../Immagini/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../Immagini/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php 
      if (!isset($_SESSION["login"])) {
        header("Location: ../Login/login_form.php");
        exit();
      }
      
      include("../Comuni/header.php");
    ?>

    <section class="register" id="register">
        <div class="container">
            <div class="row h-100 align-items-center align-content-center">
                <form action="change_pass.php" method="post">
                    <fieldset class="fieldset">
                    <legend class="legend"> <h1> Modifica password </h1> </legend>
                        
                    <i class="fas fa-key"></i>
                    <label for="pass">Vecchia password</label> <br>
                    <input type="password" class="user-data" id="oldpass" name="oldpass" required> <br><br>

                    <i class="fas fa-key"></i>
                    <label for="pass">Nuova password</label> <br>
                    <input type="password" class="user-data" id="pass" name="pass" required> <br><br>

                    <i class="fas fa-key"></i>
                    <label for="confirm">Conferma nuova password</label> <br>
                    <input type="password" class="user-data" id="confirm" name="confirm" required>

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