<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Home</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
    <div class="container">
        <?php 
            include("Comuni/header.php");
            include("Comuni/menu.php");
        ?>
        
        <div class="content">
            <?php
                if(isset($_SESSION["login"]))
                    echo "<h1> Benvenuto ".$_SESSION["firstname"]."! </h1>";
                else
                    echo "<h1> Benvenuto! Registrati o effettua il login </h1>";
            ?>
        </div>
  	</div>
	
	<?php include("Comuni/footer.php"); ?>

</body>
</html>