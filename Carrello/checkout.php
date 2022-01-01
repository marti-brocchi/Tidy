<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="checkout-style.css">
    </head>
    <body>
        <?php 
            include("../Comuni/header.php");

            // svuota il carrello
            // e lo rinizializza vuoto
            $cart_array = array(
              "prod" => array(),    // array per i prodotti
              "quant" => array(),    // array per le quantità
            );
        
            $_SESSION["cart"]=$cart_array;
        ?>

        <section class="checkout-section">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="checkout-text">
                        <h1>Grazie per il tuo Ordine!</h1>
                        <h3>Se sarai soddisfatto, potrai lasciare una recensione.</h3>
                    </div>
                </div>
            </div>
        </section>


        <?php include("../Comuni/footer.php"); ?>
       
    </body>
</html>
