<!DOCTYPE html>
<html lang="it">
<head>
    <title>Login</title>
</head>

<body>

<?php
	include("../Comuni/DB_connect.php");

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	session_start();


  // svuota il carrello e lo rinizializza vuoto
  $cart_array = array(
    "prod" => array(),    // array per i prodotti
    "quant" => array(),    // array per le quantità
  );
        
  $_SESSION["cart"]=$cart_array;

	header("Location: ../Carrello/cart.php");
	exit();
?>

</body>
</html>