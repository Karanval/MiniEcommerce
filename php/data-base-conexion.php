<?php
  $servername = "localhost";
  $username = "root";
  $db = "miniecommerce";
  $conn = new mysqli($servername, $username, "", $db);
  if ($conn->connect_error) {
     echo "Connection failed: " . $conn->connect_error;
   }
?>
