<?php
  $con = mysqli_connect('localhost', 'S4784539', '$LaxMarti2122', 'S4784539');

  if (mysqli_connect_errno($con)) {
    echo "<h1> Qualcosa è andato storto :( </h1>";
    exit();
  } 
?>