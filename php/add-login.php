<?php
  session_start();
  if (isset($_SESSION["user"])){
    $user = $_SESSION["user"];

    echo "<p align= right> <a id="."logout"." href="."#".">".$user."</a> </p>";
  }else{
    echo  "<a id="."login"."  class="."customer-link".">
              <img width="."30px"." height="."30px"." src="."images/icono-persona.png"." class="."icono-cliente".">
           </a>";
  }
 ?>
