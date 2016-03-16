<?php
  session_start();
  if (isset($_SESSION["user"])){
    $user = $_SESSION["user"];

    echo "<p align= right> <a href = "."logout.php"." >".$user."</a> </p>";
  }else{
    echo  "<a class="."customer-link"." href="."add-customer-page.html".">
              <img width="."30px"." height="."30px"." src="."images/icono-persona.png"." class="."icono-cliente".">
           </a>";
    //echo "<p align= right> without session </p>";
  }
 ?>
