<nav class="menu">
    <ul>
        <li><a href="homepage.php">Home</a></li> 
        <li><a href="#">Prodotti</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Chi siamo</a></li> 
        <li><a href="#">Contatti</a></li>

        <?php
            if(isset($_SESSION["login"])){
                echo"<li><a href=\"show_profile.php\">Profilo</a></li>";
                echo"<li><a href=\"logout.php\">Logout</a></li>";
            }
            else {
                echo"<li><a href=\"registration_form.php\">Registrati</a></li>";
                echo"<li><a href=\"login_form.php\">Login</a></li>";
            }
        ?>
    </ul>
</nav>