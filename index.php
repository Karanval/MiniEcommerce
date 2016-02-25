
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
			$servername = "localhost";
			$username = "root";
			$db = "miniecommerce";
			// Create connection
<<<<<<< HEAD
			$conn = new mysqli($servername, $username,"", $db);
=======
			$conn = new mysqli($servername, $username, "", $db);
>>>>>>> badfa038f0eda936a6ffaa43a9ec284033070ff9
			// Check connection
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			$pagina = 3;//para los indices
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM productos LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {
			       $nombre = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
<<<<<<< HEAD
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
			     }
			} else {
			     echo "0 results";
			}

			$conn->close();
			?>

		</ul>
	</section >
  </center>

</body>
</html>
