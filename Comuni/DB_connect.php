<?php
  $con = mysqli_connect('localhost', '4784539', 'LaxMarti2122!', 'saw_progetto_21_db');

  if (mysqli_connect_errno($con)) {
    echo "<h1> Qualcosa è andato storto :( </h1>";
    exit();
  } 
?>