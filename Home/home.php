<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="home-style.css">
    </head>
    <body>
        <?php 
            include("../Comuni/header.php");
        ?>

        <section class="home-section" id="home">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="home-text">
                        <h1>Sanitizing bracelets</h1>
                        <h3>Frase d'effetto?</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="chi-siamo-section" id="chi-siamo">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="chi-siamo-text">
                        <h1>Chi siamo</h1>
                        <p>Start-up italiana ... <br> 
                        Produzione braccialetti sanificanti... </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="prodotti-section" id="prodotti">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="prodotti-text">
                        <h1>Prodotti</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="shop-section" id="shop">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="shop-text">
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="contatti-section" id="contatti">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center justify-content-between">
                    <div class="contatti-text">
                        <h1>Contatti</h1>
                    </div>
                    <div class="person">
                        <img src="../Immagini/wanda.jpg" alt="Martina">
                        <div class="name"> Martina Brocchi </div>
                    </div>
                    <div class="person">
                        <img src="../Immagini/cosmo.jpg" alt="Lorenzo">
                        <div class="name"> Lorenzo La Corte </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("../Comuni/footer.php"); ?>
       
    </body>
</html>
