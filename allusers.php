<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Utenti</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta name = "viewport" content = "width=device-width" />
</head>

<body>
<?php 
   include("Comuni/header.php");
  include("Comuni/menu.php");
?>

<?php
	// mi connetto al DB
	include("Comuni/DB_connect.php");
?>

<?php
/* Visualizzazione di una lista di tutti gli utenti */

// costruisco una query che restituisce tutti i dati di tutti gli utenti
$select_query = "SELECT * FROM utenti;"; 

// eseguo la query
$result = mysqli_query($con, $select_query);

// controllo che tutto sia andato a buon fine
if(!($result))
{
echo "<h1> Qualcosa è andato storto :( </h1>";
exit();
}

// formatto la stampa
echo "<ul><br><br>";

while($user_data = mysqli_fetch_assoc($result))
{
  // se tutto è andato a buon fine inseriesco in $hash la password che è presente nel DB
  echo "<li> Nome: ".$user_data["firstname"]."</li><li>Cognome: ".$user_data["lastname"]."</li><li> E-Mail: ".$user_data["email"]."</li><li> Password: ".$user_data["pass"]."</li><br><br>";
}
echo "</ul>";

?>

<?php include("Comuni/footer.php"); ?>

</body>
</html>