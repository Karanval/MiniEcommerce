
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
			$conn = new mysqli($servername, $username, "", $db);
			// Check connection
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			$cont = 5;//para los indices
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM productos LIMIT 9 OFFSET $cont";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {
			       $nombre = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
			       echo "<li class="."product".">
							 			<a href="."product.html"." class="."product-link".">
							 				<img width="."200px"." height="."200px"." src=".$img_path." class="."product-img".">
										<div clas="."product-texts".">
											<p class="."product-name"." >
							 					"."$nombre"."
											</p>
											<p class="."product-price"." >
													".  $precio."
											</p>
							 			</a>
										</div>
							 		</li>";
			     }
			} else {
			     echo "0 results";
			}

			$conn->close();
			?>

		</ul>
			</section >
			</center>

			<center>
			<div class="">
					<div class="">
							<a class="" href="">1</a>
							<a class="" href="example.html">2</a>
							<a class="" href="example.html">3</a>
							<a class="" href="example.html">4</a>
					</div>

					<div class="n">
							<a class="" href="break.html">Siguiente</a>
					</div>
			</div>
		</center>
</body>
</html>
