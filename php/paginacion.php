<?php
  $servername = "localhost";
  $username = "root";
  $db = "miniecommerce";
  $conn = new mysqli($servername, $username, "", $db);
  if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
  }
  $sql = "SELECT * FROM PRODUCTOS";
  $result = $conn->query($sql);

  $cont = ceil(($result->num_rows) / 9);
  for ($i=1; $i <= $cont; $i++) {
    echo "<input class="."index-item"." type="."submit"." name="."pagina"." value=".$i.">";
  }
?>
