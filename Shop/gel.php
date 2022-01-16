<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="shop-style.css">
        <link rel="stylesheet" type="text/css" href="product-page-style.css">
        <link rel="shortcut icon" href="../Immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../Immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php 
            include("../Comuni/header.php");

        ?>
        
        <?php 
              include("../Comuni/DB_connect.php");

              // acquisici il prodotto mediante il codice cod
              $stmt = mysqli_prepare($con, "SELECT * FROM prodotti WHERE cod = 'gel'");
              
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($res); 
              mysqli_stmt_close($stmt);
      
              // controlla che il risultato sia di una sola riga
              if (mysqli_num_rows($res)==0) {
                  error_log($dateTime." -- Pagina Gel -- Error: nessuna riga associata al codice:".$product_i."\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
                  header("Location: ../Home/home.php");
                  exit();
              }
              if (mysqli_num_rows($res)>1) {
                  error_log($dateTime." -- Pagina Gel -- Error: restituite più righe associate ad un codice\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
                  header("Location: ../Home/home.php");
                  exit();
              }
        ?>

        <form class="form" action="../Carrello/cart.php" method="post">
          <section class="prodotto-section">
            <div class="container">
              <div class="row h-100 align-items-center align-content-center text-align-center">
                <div class="prodotto-cont">

                  <div class="img-cont">
                    <?php echo "<img src=".$row['pathImg']." alt=".$row['altTextImg']." longdesc=".$row['descImg'].">"; ?>
                  </div>

                  <div class="desc-cont">
                    <?php echo "<h1>".$row['nome']." ".$row['caratteristica']."</h1>"; ?>

                    <?php echo "<h2 class=\"price\">".$row['prezzo']."&#128;</h2>"; ?>
                    
                    <?php echo "<p class=\"add-more-padding-top\">".$row['descrizione']."</p>"; ?>

                    <div class="checkout-details add-more-padding-top">
                      <div class="quantCont">
                        <label for="gelQuant"> Quantità: </label>
                        <select class="cardQuant" id="gelQuant" name="gelQuant">
                          <option value="1">1</option>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="50">50</option>
                        </select>
                      </div>

                      <input type="submit" name="btnBracelet" class="buyProd" value="Aggiungi al Carrello">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>


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
