<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
</head>

<body>

<?php
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

    $email = test_input($_POST["email"]);
	if (!($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
		echo "<h1>Error: formato email non valido</h1>";
		header("Refresh:5; url=registration_form.php");
		return;
	}

	$password = test_input($_POST["pass"]);
    $hash = "";

    $fp=fopen($_SERVER['DOCUMENT_ROOT']."/../users.txt","r");
	flock($fp, LOCK_SH);

    $founded = false;
    while (!feof($fp) && !$founded) {
        $line = fgets($fp);
        if (strpos($line, $email)) {
            $founded= true;
            $words = explode('|', trim($line));
            $hash = $words[sizeof($words)-1];
        }
    }
    
	flock($fp, LOCK_UN);
	fclose($fp);

    if(!password_verify($password, $hash)) {
        echo "<h1>Errore: email o password errati</h1>";
        header("Refresh:5; url=login_form.php");
        return;
    }

    function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

</body>
</html>