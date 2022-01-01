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
        
        <form class="form" action="../Carrello/cart.php" method="post">
            <section class="shop-section">
                <div class="container">
                    <div class="row h-100 align-items-center align-content-center">

                            <div class="card" id="brac">
                                <div class="cardImg">
                                    <img src="../Immagini/ImmaginiShop/azzurro.png" id="bracImg" alt="bracciale igenizzante">
                                </div>
                                <div class="cardContent">
                                    <h2>Tidy Bracelet</h2>
                                    <h2 class="price">&#128;19<small>.99</small></h2>
                                    <div class="product-colors" id="colori">

                                        <label class="colorCont">
                                            <input type="radio" value="azzurro" checked="checked" name="colore">
                                            <span class="checkmark azzurro"></span>
                                        </label>
                                        <label class="colorCont">
                                            <input type="radio" value="verde" name="colore">
                                            <span class="checkmark verde"></span>
                                        </label>
                                        <label class="colorCont">
                                            <input type="radio" value="giallo" name="colore">
                                            <span class="checkmark giallo"></span>
                                        </label>
                                        <label class="colorCont">
                                            <input type="radio" value="arancione" name="colore">
                                            <span class="checkmark arancione"></span>
                                        </label>
                                        <label class="colorCont">
                                            <input type="radio" value="rosa" name="colore">
                                            <span class="checkmark rosa"></span>
                                        </label>

                                    </div>

                                    <div class="quantCont">
                                        <label for="bracQuant"> Quantità: </label>
                                        <select class="cardQuant" id="bracQuant" name="bracQuant">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="btnBracelet" class="buy" value="Aggiungi al Carrello">
                                </div>
                            </div>

                            <div class="card" id="gel">
                                <div class="cardImg">
                                    <img src="../Immagini/ImmaginiShop/gel.png" id="bracImg" alt="gel igenizzante">
                                </div>
                                <div class="cardContent">
                                    <h2>Gel Igenizzante 80<small>ml</small></h2>
                                    <h2 class="price">&#128;2<small>.99</small></h2>
                                    
                                    <div class="quantCont add-padding-top">
                                        <label for="gelQuant"> Quantità: </label>
                                        <select class="cardQuant" id="gelQuant" name="gelQuant">
                                            <option value="1">1</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="btnGel" class="buy" value="Aggiungi al Carrello">
                                </div>
                            </div>

                            <div class="card" id="bundle">
                                <div class="cardImg">
                                    <img src="../Immagini/ImmaginiShop/bundle.png" id="bracImg" alt="bundle 5 bracciali e 5 gel igenizzanti">
                                </div>
                                <div class="cardContent">
                                    <h2>Bundle 5 Bracelets + 5 Gel Igenizzanti</h2>
                                    <h2 class="price">&#128;99<small>.99</small></h2>

                                    <div class="quantCont add-padding-top">
                                        <label for="bundleQuant"> Quantità: </label>
                                        <select class="cardQuant" id="bundleQuant" name="bundleQuant">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="btnBundle" class="buy" value="Aggiungi al Carrello">
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </form>

        <?php include("../Comuni/footer.php"); ?>
        <script src="scriptShop.js"> </script>

    </body>
</html>
