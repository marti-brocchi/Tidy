<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
  <div class="container">
    <?php 
      include("Comuni/header.php");
      include("Comuni/menu.php");
      include("Comuni/DB_connect.php");
    ?>

    <?php
      // la sessione è già stata inizializzata in menu.php
      echo "<h1 class='centered'>".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</h1>";
      

    ?>
  </div>
	
	<?php include("Comuni/footer.php"); ?>

</body>
</html>