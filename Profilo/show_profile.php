<?php session_start(); ?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Tidy - Profilo</title>
  <link rel="stylesheet" type="text/css" href="../Comuni/style.css" />
  <link rel="stylesheet" type="text/css" href="profile-style.css" />
  <link rel="stylesheet" type="text/css" href="../Comuni/form-style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name = "viewport" content = "width=device-width" />
</head>

<body>
    <?php 
        include("../Comuni/header.php");
        include("../Comuni/DB_connect.php");

        // se non c'è sessione, reindirizza al login
        if (!(isset($_SESSION["login"]))) header("Location: ../Login/login_form.php");

        // costruisco una query che restituisce i dati associati all'utente con quella mail
        $stmt = mysqli_prepare($con, "SELECT * FROM utenti WHERE email=?");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION["email"]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res); 
        mysqli_stmt_close($stmt);

        if (mysqli_num_rows($res)==0) {
            error_log($dateTime." -- Profilo -- Error: nessuna riga associata alla mail\n", 3, "../../log.txt");
            header("Location: ../Login/login_form.php");
            exit();
        }

        if (mysqli_num_rows($res)>1) {
            error_log($dateTime." -- Profilo -- Error: restituite più righe associate ad una mail\n", 3, "../../log.txt");
            header("Location: ../Login/login_form.php");
            exit();
        }

        $stmt2 = mysqli_prepare($con, "SELECT * FROM info_utenti WHERE id=?");
        mysqli_stmt_bind_param($stmt2, 'i', $row["id"]);
        mysqli_stmt_execute($stmt2);
        $res2 = mysqli_stmt_get_result($stmt2);
        $row2 = mysqli_fetch_assoc($res2); 
        mysqli_stmt_close($stmt2);

        if (mysqli_num_rows($res2)>1) {
            error_log($dateTime." -- Profilo -- Error: restituite più righe associate ad un utente\n", 3, "../../log.txt");
            header("Location: ../Login/login_form.php");
            exit();
        }
    ?>

    <section class="show-profile" id="show-profile">
        <div class="container">
            <div class="row h-100 align-items-center align-content-center justify-content-between">
                <form class="form" action="update_profile.php" method="post">   
                    <div class="profile-item align-content-center">
                        <img class="profile-photo" alt="immagine di profilo" id="ImmagineProfilo" src=
                            <?php 
                            if(isset($row2) and $row["sesso"] == "maschio") echo "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person13-1024.png";
                            else if(isset($row2) and $row["sesso"] == "femmina") echo "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person12-1024.png";
                            else echo "https://cdn4.iconfinder.com/data/icons/light-ui-icon-set-1/130/avatar_2-1024.png";
                            ?>
                        >

                        <div class="text-align-center"><b><?php echo $row["firstname"]." ".$row["lastname"] ?></b></div>
                        <div class="text-align-center"><b><?php echo $row["email"] ?></b></div>
                        <br>
                        <fieldset class="fieldset" id="sceltaSesso">
                            <legend> <h3> Sesso </h3> </legend>
                            <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="sesso" id="maschio" value="maschio" <?php if(isset($row2) and $row2["sesso"] == "maschio") echo "checked"?> >
                            <label class="form-check-label" for="maschio">M</label>
                            
                            <input class="form-check-input" type="radio" name="sesso" id="femmina" value="femmina" <?php if(isset($row2) and $row2["sesso"] == "femmina") echo "checked"?>>
                            <label class="form-check-label" for="femmina">F</label>

                            <input class="form-check-input" type="radio" name="sesso" id="altro" value="" <?php echo "checked"?>>
                            <label class="form-check-label" for="altro">Altro</label>
                            </div>
                        </fieldset>

                        <div class="password">
                            <a class="button" href="change_password.php">Modifica password</a>
                        </div>
                    </div>

                    <div class="profile-item align-content-center">
                        <fieldset class="fieldset">

                            <label for="firstname">Nome</label> <br>
                            <input class="user-data" type="text" id="firstname" name="firstname" placeholder="Inserisci nome" required
                            <?php // visualizzo il valore già esistente
                                echo "value='".$row["firstname"]."'";
                            ?> > <br><br>
                       
                            <label for="lastname">Cognome</label> <br>
                            <input class="user-data" type="text" id="lastname" name="lastname" placeholder="Inserisci cognome" required
                            <?php // visualizzo il valore già esistente
                                echo "value='".$row["lastname"]."'";
                            ?> > <br><br>
                           
                            <label for="email">E-Mail</label> <br>
                            <input class="user-data" type="email" id="email" name="email" placeholder="Inserisci email" required readonly
                            <?php // visualizzo il valore già esistente
                                echo "value='".$row["email"]."'";
                            ?> > <br><br>
                          
                            <label for="dataDiNascita">Data di Nascita</label> <br>
                            <input class="user-data" type="date" id="dataDiNascita" name="dataDiNascita"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["dataDiNascita"]."'";
                            ?> > <br><br>
                          
                            <label for="telefono">Telefono</label> <br>
                            <input class="user-data" type="tel" id="telefono" name="telefono" placeholder="Inserisci numero di telefono"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["telefono"]."'";
                            ?> >
                        </fieldset>
                    </div>

                    <div class="profile-item align-content-center">
                        <fieldset class="fieldset">
                           
                            <label for="stato">Stato</label> <br>
                            <input class="user-data" type="text" id="stato" name="stato" placeholder="Inserisci stato"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["stato"]."'";
                            ?> > <br><br>
                           
                            <label for="provincia">Provincia</label> <br>
                            <input class="user-data" type="text" id="provincia" name="provincia" placeholder="Inserisci provincia"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["provincia"]."'";
                            ?> > <br><br>
                           
                            <label for="citta">Città</label> <br>
                            <input class="user-data" type="text" id="citta" name="citta" placeholder="Inserisci città"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["citta"]."'";
                            ?> > <br><br>
                           
                            <label for="indirizzo">Indirizzo</label> <br>
                            <input class="user-data" type="text" id="indirizzo" name="indirizzo" placeholder="Inserisci indirizzo"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["indirizzo"]."'";
                            ?> > <br><br>
                            
                            <label for="CAP">CAP</label> <br>
                            <input class="user-data" type="text" id="CAP" name="CAP" placeholder="Inserisci codice postale"
                            <?php // visualizzo il valore già esistente
                                if (isset($row2))
                                    echo "value='".$row2["CAP"]."'";
                            ?> >
                            </div>
                        </fieldset>                    
                    </div>
                    
                    <div class="align-content-center">
                        <input class="button" type="submit" name="submit" value="Salva profilo">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include("../Comuni/footer.php"); ?>
    <script src="scriptProfile.js"></script>
</body>
</html>