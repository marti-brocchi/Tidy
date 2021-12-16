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
                        <h1>Sanitizing Bracelets</h1>
                        <h3>Il tuo igenizzante, sempre a portata di mano</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="chi-siamo-section" id="chi-siamo">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center  text-align-center">
                    <div class="chi-siamo-text">
                        <h1>Chi siamo</h1>
                        <p>Tidy Sanitizing Bracelet è una start-up italiana, nata nel cuore
                         della pandemia.</p>
                         <br>
                         <p> Il nostro scopo è quello di fornire un prodotto comodo e pratico. </p>
                        <br>
                        <p> Tidy è infatti un innovativo bracciale con la funzione di igenizzare 
                         le tue mani in ogni momento della giornata, 
                         senza pensare più a portare con te guanti o il disinfettante. </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="prodotti-section" id="prodotti">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="prodotti-text">
                        <h1>Prodotti</h1>
                        <p>Tidy è caratterizzato da un design minimal, sportivo,
                        divertente ma allo stesso tempo elegante. </p>
                        <br>
                        <p> Il materiale con cui è prodotto lo rende comodo, flessibile,
                        anallergico e lavabile. </p>
                        <br>
                        <p> Il suo meccanismo consiste nel riempirlo, 
                        con qualsiasi igienizzante in commercio
                        e, semplicemente con una leggera
                        pressione (squeeze) far fuoriuscire il
                        gel, dall’erogatore direttamente sul palmo della mano. </p>
                        <br>
                        <p> In questo modo Tidy ti regalerà una sensazione di freschezza, 
                        pulizia e sicurezza immediata.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="shop-section" id="shop">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="shop-text">
                        <a class="button" href="shop.php">Accedi allo Shop</a>
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
