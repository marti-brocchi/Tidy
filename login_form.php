<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Login</title>
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
            <form action="login.php" method="post">
				<fieldset>
					<legend> <b> Login </b> </legend>
					<i class="far fa-envelope"></i>
					<label for="email">E-mail</label> <br>
					<input type="email" id="email" name="email" placeholder="Inserisci email" required> <br><br>

					<i class="fas fa-key"></i>
					<label for="pass">Password</label> <br>
					<input type="password" id="pass" name="pass" placeholder="Inserisci password" required> <br><br>
				</fieldset>
				<br><br>
				<input type="submit" name="submit" value="Invia">
			</form>
        </div>
	</div>
	
	<?php include("Comuni/footer.php"); ?>

</body>
</html>