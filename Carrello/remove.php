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

  $cod = isset($_GET["cod"]) ? test_input($_GET["cod"]) : "";

  // trova la chiave dell'elemento e lo elimina
  if (($key = array_search($cod, $_SESSION["cart"]["prod"])) !== false) {
		unset($_SESSION["cart"]["prod"][$key]);
    unset($_SESSION["cart"]["quant"][$key]);

		// risettare l'array
  }

	header("Location: ../Carrello/cart.php");
	exit();
?>

</body>
</html>