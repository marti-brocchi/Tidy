<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
	/****************************************************************************/
	/* TO BE DONE                                                               */
	/*                                                                          */
	/* This means: reading the data sent in POST, "cleaning" them, verifying    */
	/* that the user sent what you expect, writing data in the file             */
	/*                                                                          */
    	/* If something goes wrong send back appropriate messages                   */
	/****************************************************************************/

	foreach ($_POST as &$val) {
		if (!isset($val)) {
			echo "<h1>Errore: compilare tutti i campi richiesti</h1>";
			header("Refresh:5; url=registration_form.php");
			return;
		}

		if (empty($val)){
			echo "<h1>Errore: non possono essere presenti campi vuoti</h1>";
			header("Refresh:5; url=registration_form.php");
			return;
		}
	}
	
	$firstname = test_input($_POST["firstname"]);
	$lastname = test_input($_POST["lastname"]);
	
	$email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	$password = test_input($_POST["pass"]);
	$confirm = test_input($_POST["confirm"]);

	if (strcmp($password, $confirm)!=0) {
		echo "<h1>Errore: le password non coincidono</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$line = $firstname ."|". $lastname ."|". $email ."|". $hash; 
	
	//Apertura file e scrittura dati
	$fp=fopen($_SERVER['DOCUMENT_ROOT']."/../users.txt","a");
	flock($fp, LOCK_EX);
	fwrite($fp, $line);
	flock($fp, LOCK_UN);
	fclose($fp);

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

</body>
</html>
