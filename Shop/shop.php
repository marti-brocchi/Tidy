<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="shop-style.css">
    </head>
    <body>
        <?php 
            include("../Comuni/header.php");
        ?>

        <section class="shop-section">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center">
                    <div class="card" id="card">
                        <div class="cardImg">
                            <img src="../Immagini/ImmaginiShop/azzuro.png" id="bracImg" alt="bracciale igenizzante">
                        </div>
                        <div class="cardContent">
                            <h2>Tidy Bracelet</h2>
                            <h2 class="price">&#128;19<small>.99</small></h2>
                            <div class="product-colors" id="colori">
                                <div class="azzurro"></div>
                                <div class="verde"></div>
                                <div class="giallo"></div>
                                <div class="arancione"></div>
                                <div class="rosa"></div>
                            </div>
                            <a href="#" class="buy" id="buyBtn">Aggiungi al Carrello</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("../Comuni/footer.php"); ?>
        <script src="scriptShop.js"> </script>

    </body>
</html>
