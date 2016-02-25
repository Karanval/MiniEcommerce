
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>
		Home
	</title>
</head>
<body>
	<header>
		<a class="customer-link" href="add-customer-page.html">
		<img width="30px" height="30px" src="images/icono-persona.png" class="icono-cliente"></a>
		<h1 class="title">
				Mini e-commerce
		</h1>
	</header>
	<center>
	<section class="products-section">
		<ul class="products-list">
			<?php

			if(isset($_GET['pagina']) && $_GET['pagina']!=1){
  			$pagina = 0;
				for ($i=1; $i <$_GET['pagina'] ; $i++) {
					$pagina = $pagina + 9;
				}
			} else {
				$pagina = 1;
			}
			$servername = "localhost";
			$username = "root";
			$db = "miniecommerce";
			// Create connection
<<<<<<< HEAD
<<<<<<< HEAD
			$conn = new mysqli($servername, $username,"", $db);
=======
			$conn = new mysqli($servername, $username, "", $db);
>>>>>>> badfa038f0eda936a6ffaa43a9ec284033070ff9
=======
			$conn = new mysqli($servername, $username, "", $db);
>>>>>>> 9cc7873bb2b265ea1e3fc1a98c98761410c435a1
			// Check connection
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			//$pagina = 3;//para los indices
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM productos LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {
			       $nombre = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 9cc7873bb2b265ea1e3fc1a98c98761410c435a1
			       echo "
						 				<li class="."product".">
							 				<a href="."product-detail.php?name="."$nombre"."&path="."$img_path"." class="."product-link".">
							 					<img width="."200px"." height="."200px"." src=".$img_path." class="."product-img".">
													<div clas="."product-texts".">
													<p class="."product-name"." >
							 							"."$nombre"."
													</p>
													<p class="."product-price"." >
														Bs. ".  $precio."
													</p>
							 				</a>
													</div>
							 			</li>
									";
<<<<<<< HEAD
=======
			       echo "<li class="."product".">
							 			<a href="."product.html"." class="."product-link".">
							 				<img width="."200px"." height="."200px"." src=".$img_path." class="."product-img".">
										<div clas="."product-texts".">
											<p class="."product-name"." >
							 					"."$nombre"."
											</p>
											<p class="."product-price"." >
													Bs. ".  $precio."
											</p>
							 			</a>
										</div>
							 		</li>";
>>>>>>> badfa038f0eda936a6ffaa43a9ec284033070ff9
=======
>>>>>>> 9cc7873bb2b265ea1e3fc1a98c98761410c435a1
			     }
			} else {
			     echo "0 results";
			}

			$conn->close();
			?>

		</ul>
	</section >
  </center>
	<section class="index-section">
		<form class="index" action="index.php">
			<?php
				$servername = "localhost";
				$username = "root";
				$db = "miniecommerce";
				$conn = new mysqli($servername, $username, "", $db);
				if ($conn->connect_error) {
						 echo "Connection failed: " . $conn->connect_error;
				}
				$sql = "SELECT NOMBRE FROM productos";
				$result = $conn->query($sql);

				$cont = round(($result->num_rows) / 9);
				for ($i=1; $i <= $cont; $i++) {
					echo "<input class="."index-item"." type="."submit"." name="."pagina"." value=".$i.">";
				}
			?>
		</form>
	</section>

</body>
</html>
