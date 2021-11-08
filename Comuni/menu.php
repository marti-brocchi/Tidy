<nav class="menu">
    <ul>
        <li><a href="#">Home</a></li> 
        <li><a href="#">Prodotti</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Chi siamo</a></li> 
        <li><a href="#">Contatti</a></li>

        <?php
            session_start(); // recupera la sessione esistente

            if(isset($_SESSION["login"])) // se è impostata il login ha avuto successo
            {
                // visualizzo profilo e logout
                echo "<li class=\"addpadding\"><a href=\"#\">Profilo</a></li>";
                echo "<li><a href=\"logout.php\">Logout</a></li>";
            }
            else 
            {
                // visualizzo login e registrati
                echo "<li class=\"addpadding\"><a href=\"registration_form.php\">Registrati</a></li>";
                echo "<li><a href=\"login_form.php\">Login</a></li>";
            }
        ?>

         
    </ul>
</nav>