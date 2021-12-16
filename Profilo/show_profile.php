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
            error_log($dateTime." -- Profilo -- Error: nessuna riga associata alla mail\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
            header("Location: ../Login/login_form.php");
            exit();
        }

        if (mysqli_num_rows($res)>1) {
            error_log($dateTime." -- Profilo -- Error: restituite più righe associate ad una mail\n", 3, $_SERVER["DOCUMENT_ROOT"]."../log.txt");
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
                            if($row["sesso"] == "maschio") echo "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person13-1024.png";
                            else if($row["sesso"] == "femmina") echo "https://cdn2.iconfinder.com/data/icons/lil-silhouettes/2176/person12-1024.png";
                            else echo "https://cdn4.iconfinder.com/data/icons/light-ui-icon-set-1/130/avatar_2-1024.png";
                            ?>
                        >

                        <div class="text-align-center"><b><?php echo $row["firstname"]." ".$row["lastname"] ?></b></div>
                        <div class="text-align-center"><b><?php echo $row["email"] ?></b></div>
                        <br>
                        <fieldset class="fieldset" id="sceltaSesso">
                            <legend> <h3> Sesso </h3> </legend>
                            <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="sesso" id="maschio" value="maschio" <?php if($row["sesso"] == "maschio") echo "checked"?> >
                            <label class="form-check-label" for="maschio">M</label>
                            
                            <input class="form-check-input" type="radio" name="sesso" id="femmina" value="femmina" <?php if($row["sesso"] == "femmina") echo "checked"?>>
                            <label class="form-check-label" for="femmina">F</label>

                            <input class="form-check-input" type="radio" name="sesso" id="altro" value="" <?php if($row["sesso"] == "") echo "checked"?>>
                            <label class="form-check-label" for="altro">Altro</label>
                            </div>
                        </fieldset>

                        <div class="password">
                            <a class="button" href="change_password.php">Modifica password</a>
                        </div>
                    </div>

                    <div class="profile-item align-content-center">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel tempore obcaecati ea sequi voluptatibus illum nihil inventore cupiditate iusto, enim voluptas, beatae, quod explicabo. Magnam sint delectus repellendus excepturi suscipit. </p>
                    </div>
                    <div class="profile-item align-content-center">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel tempore obcaecati ea sequi voluptatibus illum nihil inventore cupiditate iusto, enim voluptas, beatae, quod explicabo. Magnam sint delectus repellendus excepturi suscipit. </p>
                    </div>
                    <input type="submit" name="submit" value="Salva profilo">
                </form>
            </div>
        </div>
    </section>

    <?php include("../Comuni/footer.php"); ?>
    <script src="scriptProfile.js"></script>
</body>
</html>