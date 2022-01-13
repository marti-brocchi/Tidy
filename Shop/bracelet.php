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
            <div class="row h-100 align-items-center align-content-center">
              <div class="prodotto-text">
                <h1>Chi siamo</h1>
                <p>Tidy Sanitizing Bracelet è una start-up italiana, nata nel cuore </p>
              </div>
            </div>
          </div>
        </section>

        <section class="valutazioni-section">
            <div class="container">
                <div class="row h-100 align-items-center align-content-center  text-align-center">
                    
                </div>
            </div>
        </section>

        <?php include("../Comuni/footer.php"); ?>
       
    </body>
</html>
