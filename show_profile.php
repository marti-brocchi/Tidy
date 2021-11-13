<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name = "viewport" content = "width=device-width" />
</head>

<body>
  <div class="container">
    <?php 
      include("Comuni/header.php");
      include("Comuni/menu.php");
      include("Comuni/DB_connect.php");
    ?>
    <div class="content">
    <?php
      if (isset($_SESSION["login"]))
        echo "<h1>".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</h1>";
      else
        header("Location: login_form.php");
    ?>
    </div>
  </div>
	
	<?php include("Comuni/footer.php"); ?>

</body>
</html>
