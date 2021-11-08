<!DOCTYPE html>
<html lang="it">
<head>
	<title> Tidy - Registrazione </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
	<div class="container">
		<?php 
			include("Comuni/header.php");
			include("Comuni/menu.php");
		?>

		<div class="content">
			<form action="registration.php" method="post">
				<fieldset>
					<legend> <b> Registrati </b> </legend>
					
					<i class="far fa-user"></i>
					<label for="firstname">Nome</label> <br>
					<input type="text" id="firstname" name="firstname" placeholder="Inserisci nome" required> <br><br>

					<i class="far fa-user"></i>
					<label for="lastname">Cognome</label> <br>
					<input type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required> <br><br>

					<i class="far fa-envelope"></i>
					<label for="email">E-mail</label> <br>
					<input type="email" id="email" name="email" placeholder="Inserisci email" required> <br><br>

					<i class="fas fa-key"></i>
					<label for="pass">Password</label> <br>
					<input type="password" id="pass" name="pass" placeholder="Inserisci password" required> <br><br>

					<i class="fas fa-key"></i>
					<label for="confirm">Conferma password</label> <br>
					<input type="password" id="confirm" name="confirm" placeholder="Inserisci password" required>

				</fieldset>
				<br><br>
				<input type="submit" name="submit" value="Invia">
			</form>
		</div>
	</div>
	
	<?php include("Comuni/footer.php"); ?>
	
</body>
</html>

