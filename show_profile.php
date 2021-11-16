<!DOCTYPE html>
<html lang="it">
<head>
  <title>Tidy - Profilo</title>
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

    // costruisco una query che restituisce i dati associati all'utente con quella mail
    $select_query = "SELECT * FROM utenti
    WHERE email = '".$_SESSION["email"]."';"; 

    // eseguo la query
    $result = mysqli_query($con, $select_query);

    // controllo che tutto sia andato a buon fine
    if(!($result))
    {
      echo "<h1> Qualcosa è andato storto :( </h1>";
      exit();
    }

    // creo un array associativo
    $user_data = mysqli_fetch_assoc($result);
  ?>

  <div class="profileContainer rounded bg-white mt-5 mb-5"> 
    <form action="edit_profile.php" method="post">   
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" alt="immagine di profilo" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <?php echo "<span class=\"font-weight-bold\">".$user_data["firstname"]." ".$_SESSION["lastname"]."</span>"  ?>
            <?php echo "<span class=\"text-black-50\">".$user_data["email"]."</span>" ?>
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
                    echo "value='".$user_data["firstname"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">Cognome</label>
                  <input type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["lastname"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">E-Mail</label>
                  <input type="email" id="email" name="email" placeholder="Inserisci email" required readonly
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["email"]."'";
                  ?> > <!-- chiusura del input -->
                </div>
                <div class="col-md-12">
                  <label class="labels">Data di Nascita</label>
                  <input type="date" id="dataDiNascita" name="dataDiNascita" class="form-control"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["dataDiNascita"]."'";
                  ?> >
                </div>          
                <div class="col-md-12">
                  <label class="labels">Telefono</label>
                  <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Inserisci numero di telefono"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["telefono"]."'";
                  ?> >
                </div>
              </fieldset>
            </div>
                      
            <div class="mt-5 text-center">
              <input type="submit" class="profileButton" name="submit" value="Salva Profilo">
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
                  <input type="text" id="stato" name="stato" class="form-control" placeholder="Inserisci stato"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["stato"]."'";
                  ?> >
                </div>
                <div class="col-md-12">
                  <label class="labels">Provincia</label>
                  <input type="text" id="provincia" name="provincia" class="form-control" placeholder="Inserisci provincia"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["provincia"]."'";
                  ?> >
                </div>
                <div class="col-md-12">
                  <label class="labels">Città</label>
                  <input type="text" id="citta" name="citta" class="form-control" placeholder="Inserisci città"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["citta"]."'";
                  ?> >
                </div>
                <div class="col-md-12">
                  <label class="labels">Indirizzo</label>
                  <input type="text" id="indirizzo" name="indirizzo" class="form-control" placeholder="Inserisci indirizzo"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["indirizzo"]."'";
                  ?> >
                </div>
                <div class="col-md-12">
                  <label class="labels">CAP</label>
                  <input type="text" id="CAP" name="CAP" class="form-control" placeholder="Inserisci codice postale"
                  <?php // visualizzo il valore già esistente
                    echo "value='".$user_data["CAP"]."'";
                  ?> >
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
