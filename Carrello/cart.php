<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Tidy </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Comuni/style.css">
        <link rel="stylesheet" type="text/css" href="cart-style.css">
    </head>
<body>
	<?php
    include("../Comuni/DB_connect.php");

    date_default_timezone_get();
    $dateTime = date('m/d/Y h:i:s a', time());
      
    // se non c'è sessione, reindirizza al login
    if (!(isset($_SESSION["login"]))) header("Location: ../Login/login_form.php");
    
     // funzione che stampa la quantità di articoli nel carrello
     function printArticoli() {
      $count = 0;
      foreach ($_SESSION["cart"]["quant"] as &$quantity) 
      {
        $count += $quantity;
      }
      if($count == 1) echo $count." Articolo";
      else echo $count." Articoli";
    }

  
    // funzione che aggiunge un elemento impostando gli array prodotto e quantità
    function addElem($elemName, $quantity) {
      if(!in_array($elemName, $_SESSION["cart"]["prod"]))
      {
        array_push($_SESSION["cart"]["prod"], $elemName);
        array_push($_SESSION["cart"]["quant"], intval($quantity));
      }
      else
      {
        $pos = array_search($elemName, $_SESSION["cart"]["prod"]);
        $_SESSION["cart"]["quant"][$pos] += intval($quantity);
      }
    }

    // aggiungi il prodotto al carrello dentro la sessione

    if(isset($_POST["btnBracelet"])) // aggiungo un bracciale
    {
      addElem("bracciale_".$_POST["colore"], $_POST["bracQuant"]);
    }
    else if(isset($_POST["btnGel"])) // aggiungo un gel
    {
      addElem("gel", $_POST["gelQuant"]);
    }
    else if(isset($_POST["btnBundle"])) // aggiungo un bundle
    {
      addElem("bundle", $_POST["bundleQuant"]);
    }
    // se non mi arriva niente in post, non aggiungo niente

	?>

  <?php 
    include("../Comuni/header.php");
  ?>

  <section class="cart-section">
    <div class="container">
      <div class="row h-100 align-items-center align-content-center">
        <div class="cart">
          
          <div class="heading">
            <h1 class="mainTitle">Carrello</h1>
            <a href="removeAll.php" class="remove">Rimuovi Tutto</a>
          </div>
        
          <?php 
          
            $printedElem = 0;
            $costoTotale = 0;
            $iter = sizeof($_SESSION["cart"]["prod"]);
            // per ogni prodotto nel carrello
            for($i=0; $i<$iter; $i++)
            {
              // se vengono rimossi elementi avrò degli indici nulli nell'array
              if(!isset($_SESSION["cart"]["prod"][$i])){
                $iter += 1; // aggiusto iter perché la size dell'array se no è sballata
                continue;
            } 
              $product_i = trim($_SESSION["cart"]["prod"][$i]);

              // acquisici il prodotto mediante il codice cod
              // SELECT * FROM prodotti WHERE cod = $product_i
              $stmt = mysqli_prepare($con, "SELECT * FROM prodotti WHERE cod =?");
              mysqli_stmt_bind_param($stmt, 's', $product_i);
              
              mysqli_stmt_execute($stmt);
              $res = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($res); 
              mysqli_stmt_close($stmt);
      
              // controlla che il risultato sia di una sola riga
              if (mysqli_num_rows($res)==0) {
                  error_log($dateTime." -- Carrello -- Error: nessuna riga associata al codice:".$product_i."\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
                  header("Location: ../Home/home.php");
                  exit();
              }
              if (mysqli_num_rows($res)>1) {
                  error_log($dateTime." -- Carrello -- Error: restituite più righe associate ad un codice\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
                  header("Location: ../Home/home.php");
                  exit();
              }

              $costoTotale += $row['prezzo']*$_SESSION['cart']['quant'][$i];

              // echo "<br><br><br>"; // DEBUG
              // print_r($row); // DEBUG


              echo "<div class=\"item\">";
              echo " <div class=\"image-box\">";
              echo "   <img src=".$row['pathImg']." alt=".$row['descrizione'].">";
              echo " </div>";
              echo " <div class=\"about\">";
              echo "   <h1 class=\"title\">".$row['nome']."</h1>";
              echo "   <h3 class=\"subtitle\">".$row['caratteristica']."</h3>";
              echo " </div>";



              echo "  <div class=\"counter\">";
              // echo "    <div class=\"btn\">-</div>";
              echo "    <div class=\"count\">x".$_SESSION['cart']['quant'][$i]."</div>";
              // echo "    <div class=\"btn\">+</div>";
              echo "  </div>";

              echo "  <div class=\"price\">";
              echo "    <div class=\"amount\">".$row['prezzo']."&#128;</div>";
              echo "    <a  class=\"remove\" href=\"remove.php?cod=".$row['cod']."\">Rimuovi</a>";
              echo "  </div>";

              echo "</div>";

              $printedElem += 1;
            }
            ?>  

          <div class="checkout align-items-center align-content-center text-align-center">
            
            <div class="total">
              <div>
                <div class="subtotal">Totale</div>
                <div class="items"><?php printArticoli(); ?></div>
              </div>
              <div class="total-amount"><?php echo $costoTotale."&#128;"; ?></div>
            </div>

            <a href="checkout.php" class="button">Checkout</button>
          </div>
      
        </div>
      </div>
    </div>
  </section>

  <style>
    /* aggiusto la pagina per tutti i dispositivi */

    .cart {
      margin-bottom: <?php echo ($printedElem*115)."px;" ?>;
    }

    @media(max-width:575px) {
      .cart {
        margin-bottom: <?php echo ($printedElem*220)."px;" ?>;
      }
    }

    @media(max-width:400px) {
      .cart {
        margin-bottom: <?php echo ($printedElem*245)."px;" ?>;
      }
    }

    @media(max-width:330px) {
      .cart {
        margin-bottom: <?php echo ($printedElem*300)."px;" ?>;
      }
    }

    @media(max-width:300px) {
      .cart {
        margin-bottom: <?php echo ($printedElem*370)."px;" ?>;
      }
    }
  </style>

  <?php include("../Comuni/footer.php"); ?>

</body>
</html>