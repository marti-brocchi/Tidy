<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy - Risultati ricerca </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="search-style.css">
        <link rel="shortcut icon" href="../Immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../Immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php 
            include("../Comuni/DB_connect.php");
            include("../Comuni/header.php");

            date_default_timezone_get();
            $dateTime = date('m/d/Y h:i:s a', time());

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <section class="result-section">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center justify-content-between">
                    <?php
                        if(empty($_GET) || !isset($_GET["searched"])) {
                            exit();
                        }

                        $text = '%'.test_input($_GET["searched"]).'%';

                        //Ottengo risultati ricerca da DB tramite prepared statement
                        $stmt = mysqli_prepare($con, "SELECT * FROM prodotti WHERE nome LIKE ?");
                        mysqli_stmt_bind_param($stmt, 's', $text);
                        mysqli_stmt_execute($stmt);
                        $res = mysqli_stmt_get_result($stmt);
                        mysqli_stmt_close($stmt);

                        if (mysqli_num_rows($res)==0) {
                            echo "<h3>La ricerca non ha prodotto risultati</h3>";
                        }
                        
                        else {
                            echo "<h3>La ricerca ha prodotto i seguenti risultati</h3>";
                            while($row = mysqli_fetch_assoc($res)) {
                                //Stampa prodotti
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        
        <?php include("../Comuni/footer.php"); ?>
       
    </body>
</html>
   