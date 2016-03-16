<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Cart</title>
  </head>
  <body>
    <header>
			<div class="right-side">
				<?php
				 	include ("php/add-login.php");
				?>
			</div>
			<h1 class="title">
					Mini e-commerce
			</h1>
		</header>

    <?php
      if(isset($_SESSION["user"]) ){
        $login = $_SESSION["user"];
        $conn = new mysqli("localhost","root", "","miniecommerce");
        if ($conn->connect_error) {
          die("Connection failed: ".$conn->connect_error);
        }

        $sql = "SELECT nom_prod FROM carrito WHERE login = '".$login."'";

        echo "<ul>";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<li>Producto: " . $row["nom_prod"]. "</li><br>";
          }
        } else {
          echo "No products added to cart";
        }
        echo "</ul>";
      } else {
        echo "Please login first";
      }
    ?>
  </body>
</html>
