<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Modifica password</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
  <div class="container">
    <?php 
      if (!isset($_SESSION["login"])) {
        header("Location: login_form.php");
        exit();
      }
      
      include("Comuni/header.php");
      include("Comuni/menu.php");
    ?>

    <div class="content">
      <form action="change_pass.php" method="post">
        <fieldset>
        <legend> <b> Modifica password </b> </legend>
            
          <i class="fas fa-key"></i>
          <label for="pass">Vecchia password</label> <br>
          <input type="password" id="oldpass" name="oldpass" required> <br><br>

          <i class="fas fa-key"></i>
          <label for="pass">Nuova password</label> <br>
          <input type="password" id="pass" name="pass" required> <br><br>

          <i class="fas fa-key"></i>
          <label for="confirm">Conferma nuova password</label> <br>
          <input type="password" id="confirm" name="confirm" required>

        </fieldset>
        <br><br>
				<input type="submit" name="submit" value="Invia">
      </form>
    </div>
  </div>
	
	<?php include("Comuni/footer.php"); ?>

</body>
</html>