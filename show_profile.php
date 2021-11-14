<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tidy - Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <meta name = "viewport" content = "width=device-width" />

  </head>

<body>
  <?php 
    include("Comuni/header.php");
    include("Comuni/menu.php");
    include("Comuni/DB_connect.php");
  ?>

  <?php
    // se non c'è sessione, reindirizza al login
    if (!(isset($_SESSION["login"]))) header("Location: login_form.php");
  ?>

  <div class="profileContainer rounded bg-white mt-5 mb-5"> 
    <form action="edit_profile.php" method="post">   
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" alt="immagine di profilo" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <?php echo "<span class=\"font-weight-bold\">".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</span>"  ?>
            <?php echo "<span class=\"text-black-50\">".$_SESSION["email"]."</span>" ?>
          </div>
        </div>

        <div class="col-md-5 border-right">
          <div class="p-3 py-5">
            <div class="row mt-3">
              <fieldset>
                <legend> <b> Dati Personali </b> </legend>
                <div class="col-md-12">
                  <label class="labels">Nome</label>
                  <input type="text" id="firstname" name="firstname" placeholder="Inserisci nome" required
                  <?php // visualizzo il valore già esistente
                    echo "value='".$_SESSION["firstname"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">Cognome</label>
                  <input type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required
                  <?php // visualizzo il valore già esistente
                    echo "value='".$_SESSION["lastname"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">E-Mail</label>
                  <input type="email" id="email" name="email" placeholder="Inserisci email" required
                  <?php // visualizzo il valore già esistente
                    echo "value='".$_SESSION["email"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">Data di Nascita</label>
                  <input type="date" class="form-control">
                </div>          
                <div class="col-md-12">
                  <label class="labels">Telefono</label>
                  <input type="tel" class="form-control" placeholder="Inserisci numero di telefono" value="">
                </div>
              </fieldset>
            </div>
                      
            <div class="mt-5 text-center">
              <input type="submit" class="profile-button" name="submit" value="Salva Profilo">
            </div>
          </div>
        </div>
          
        <div class="col-md-4">
          <div class="p-3 py-5">
            <div class="row mt-3">
              <fieldset>
                <legend> <b> Indirizzo di Fatturazione </b> </legend>
                  
                <div class="col-md-12">
                  <label class="labels">Stato</label>
                  <input type="text" class="form-control" placeholder="Inserisci stato" value="">
                </div>
                <div class="col-md-12">
                  <label class="labels">Provincia</label>
                  <input type="text" class="form-control" placeholder="Inserisci provincia" value="">
                </div>
                <div class="col-md-12">
                  <label class="labels">Città</label>
                  <input type="text" class="form-control" placeholder="Inserisci città" value="">
                </div>
                <div class="col-md-12">
                  <label class="labels">Indirizzo</label>
                  <input type="text" class="form-control" placeholder="Inserisci indirizzo" value="">
                </div>
                <div class="col-md-12">
                  <label class="labels">CAP</label>
                  <input type="text" class="form-control" placeholder="Inserisci codice postale" value="">
                </div>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

	<?php include("Comuni/footer.php"); ?>

</body>
</html>
