<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="shop-style.css">
        <link rel="stylesheet" type="text/css" href="product-page-style.css">
    </head>
    <body>
        <?php 
            include("../Comuni/header.php");
        ?>

        <section class="prodotto-section">
          <div class="container">
            <div class="row h-100 align-items-center align-content-center text-align-center">
              <div class="prodotto-cont">
                <div class="img-cont">
                  <img src="../Immagini/ImmaginiShop/gel.png" alt="gel igenizzante">
                </div>
                <div class="desc-cont">
                  <h1>Tidy Gel</h1>
                  <p>Questo Gel Disinfettante è un antisettico, studiato per disinfettare a fondo la pelle delle mani. 
                    <br> La sua formulazione è in grado di ridurre efficacemente in pochi secondi germi e batteri presenti sulla cute. 
                    <br> Per inserirlo nel bracciale basta aprire il tappo apposito e versarlo nel contenitore.
                    <br>
                    <br> Una volta schiacciato il pulsante verrà riversato il gel sul palmo della mano.
                    <br> Applicare quindi una quantità di prodotto sufficiente per coprire tutta la superficie delle mani e strofinare per 30 secondi.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="valutazioni-section">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center text-align-center">
                  <div class="valutazioni-text">
                    <h1>Valutazioni</h1>
                    <p>Tidy Sanitizing Bracelet è una start-up italiana, nata nel cuore </p>
                  </div>
                </div>
            </div>
        </section>

        <?php include("../Comuni/footer.php"); ?>
       
    </body>
</html>
