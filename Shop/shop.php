<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="shop-style.css">
        <link rel="shortcut icon" href="../Immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../Immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php 
          include("../Comuni/header.php");
        ?>
        
        <?php 
        
        include("../Comuni/DB_connect.php");

        // restituisce un array associativo con le informazioni del prodotto
        function getInfoFromCod($con, $prodCod) 
        {
            // acquisici il prodotto mediante il codice cod
            $stmt = mysqli_prepare($con, "SELECT * FROM prodotti WHERE cod = ?");
            mysqli_stmt_bind_param($stmt, 's', $prodCod);

            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($res); 
            mysqli_stmt_close($stmt);

            // controlla che il risultato sia di una sola riga
            if (mysqli_num_rows($res)==0) {
                error_log($dateTime." -- Pagina Shop -- Error: nessuna riga associata al codice\n", 3, "../../log.txt");
                // header("Location: ../Home/home.php");
                exit();
            }
            if (mysqli_num_rows($res)>1) {
                error_log($dateTime." -- Pagina Shop -- Error: restituite più righe associate ad un codice\n", 3, "../../log.txt");
                header("Location: ../Home/home.php");
                exit();
            }

            return $row;
        }
        ?>
        
        <form class="form" action="../Carrello/cart.php" method="post">
            <section class="shop-section">
                <div class="container">
                    <div class="row h-100 align-items-center align-content-center">

                            <?php $row = getInfoFromCod($con,"bracciale_azzurro"); ?>
                            <div class="card" id="brac">
                                <div class="cardImg">
                                    <?php echo "<img id=\"bracImg\" src=".$row['pathImg']." alt=".$row['altTextImg']." longdesc=".$row['descImg'].">"; ?>
                                </div>
 
                                <div class="cardContent">
                                    <?php echo "<h2>".$row['nome']." Tidy</h2>"; ?>
                                    <?php echo "<h2 class=\"price\">".$row['prezzo']."&#128;</h2>"; ?>
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

                                    <a onclick="redToBracPage()" class="goTo"> Vai al Prodotto </a>
                                    <input type="submit" name="btnBracelet" class="buy" value="Acquista Subito">
                                </div>
                            </div>

                            <?php $row = getInfoFromCod($con,"gel"); ?>
                            <div class="card max-width-gel" id="gel">
                                <div class="cardImg">
                                    <?php echo "<img src=".$row['pathImg']." alt=".$row['altTextImg']." longdesc=".$row['descImg'].">"; ?>
                                </div>

                                <div class="cardContent">
                                    <?php echo "<h2>".$row['nome']." ".$row['caratteristica']."</h2>"; ?>
                                    <?php echo "<h2 class=\"price\">".$row['prezzo']."&#128;</h2>"; ?>
                                    
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

                                    <a href="gel.php" class="goTo"> Vai al Prodotto </a>
                                    <input type="submit" name="btnGel" class="buy" value="Acquista Subito">
                                </div>
                            </div>

                            <?php $row = getInfoFromCod($con,"bundle"); ?>
                            <div class="card max-width-bundle" id="bundle">
                                <div class="cardImg">
                                    <?php echo "<img src=".$row['pathImg']." alt=".$row['altTextImg']." longdesc=".$row['descImg'].">"; ?>
                                </div>

                                <div class="cardContent">
                                    <?php echo "<h2>".$row['nome']." ".$row['caratteristica']."</h2>"; ?>
                                    <?php echo "<h2 class=\"price\">".$row['prezzo']."&#128;</h2>"; ?>

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

                                    <a href="bundle.php" class="goTo"> Vai al Prodotto </a>
                                    <input type="submit" name="btnBundle" class="buy" value="Acquista Subito">
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
