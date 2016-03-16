<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/product-detail.css">
	<title>
		Home
	</title>
	</head>

	<body>
		<header>
			<div>
					<?php
					 	include ("add-login.php");
					?>
			</div>
			<h1 class="title">
					Mini e-commerce
			</h1>
			<?
				include ("search-product.html");
			?>
		</header>

		<div id="txtHint"></div>
			<?php include ("php/add-to-cart.php"); ?>
		<?php
			include("functions.php");

      if(isset($_GET['name'])){
        $name = $_GET['name'];
      } else{
        $name = null;
      }
      if(isset($_GET['path'])){
        $path = $_GET['path'];
      } else {
        $path = null;
      }

      include("data-base-conexion.php");

			$sql = "SELECT * FROM PRODUCTOS WHERE NOMBRE = '".$name."'";
      if(!empty($name)){
  			  $result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$name = $row["NOMBRE"];
					$path = $row["IMG"];
					$cost = $row["PRECIO"];
					$stock = $row["STOCK"];
					$description = $row["DESCRIPCION"];

					echo fun_show_main_product($name,$path, $cost,$stock,$description);
      }else{
				echo "NO  DATA";
			}
			$sql = "SELECT * FROM PRODUCTOS ORDER BY RAND() LIMIT 3";
			$result = $conn->query($sql);

			echo "<center>
						<section class="."products-section".">
						<ul class = "."product-list".">";
			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {
			       $name = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $cost = $row["PRECIO"];
						 $nameImage = urlencode($row["NOMBRE"]);
			       echo fun_show_product($name, $img_path,$cost,$nameImage);
			     }
			} else {
			     echo "NO DATA...";
			}

			echo "</section>
						</ul>
						</center>";
      $conn->close();
    ?>
		<center>
						<a href= "index.php">
							<button class="button1">
								GO HOMEPAGE..
							</button>
						</a>
		</center>
	</body>
</html>
