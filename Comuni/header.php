<header class="header">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="logo">
                <a href="../Home/home.php#home">Tidy</a>
            </div>
            <input type="checkbox" id="nav-check">
            <label for="nav-check" class="nav-toggler">
                <span></span>
            </label>
            <div class="search">
                <img id="search-icon" src="https://img.icons8.com/ios-glyphs/30/ffffff/search--v1.png" alt="cerca"></img>
                <a href="../Carrello/cart.php"><img src="https://img.icons8.com/material-rounded/30/ffffff/shopping-cart-loaded.png" alt="carrello"></img></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <nav class="nav hide">
                <ul>
                    <li><a href="../Home/home.php#home">Home</a></li>
                    <li><a href="../Home/home.php#chi-siamo">Chi siamo</a></li>
                    <li><a href="../Home/home.php#prodotti">Prodotti</a></li>
                    <li><a href="../Home/home.php#contatti">Contatti</a></li>
                    <li><a href="../Shop/shop.php">Shop</a></li>
                </ul>
            </nav>
            <nav class="nav hide">
                <ul>
                    <?php
                        if(isset($_SESSION["login"])){
                            echo"<li><a href=\"../Profilo/show_profile.php\">Profilo</a></li>";
                            echo"<li><a href=\"../Login/logout.php\">Logout</a></li>";
                        }
                        else {
                            echo"<li><a href=\"../Registrazione/registration_form.php\">Registrati</a></li>";
                            echo"<li><a href=\"../Login/login_form.php\">Login</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form class="hide" id="searchbar-form" method="get" action="../Ricerca/search.php">
                <input type="text" class="searchbar" id="searchbar" name="searched" placeholder="Cerca un prodotto">
                <input type="submit" id="search-button" name="submit" value="Cerca">
            </form>
        </div>
    </div>
    <script src="../Comuni/header-script.js"></script>
</header>