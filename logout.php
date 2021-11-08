<?php
  session_start(); // recupera la sessione esistente

  /* Chiudo la sessione e rimando alla homepage */
  $_SESSION = array();
  session_destroy(); 

  header("Location: homepage.php");
?>