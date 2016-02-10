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
			<h1 class="title">Mini Ecommerce</h1>

		</header>
		<?php
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

      $conn = new mysqli("localhost","root", "","miniecommerce");
      if ($conn->connect_error) {
           die("Connection failed: ".$conn->connect_error);
      }

      //$sql = "INSERT INTO productos (NOMBRE,IMG,PRECIO,STOCK) VALUES ('".$name."', '".$path."', '".$cost."', '".$stock."')";
			$sql = "SELECT * FROM productos WHERE NOMBRE = '".$name."'";
      if(!empty($name)&& !empty($path)){
  			  $result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$name = $row["NOMBRE"];
					$path = $row["IMG"];
					$cost = $row["PRECIO"];
					$stock = $row["STOCK"];


					echo "  <center>
					    <section
							class="."principal-product".">
					      <ul class = "."product-detail".">
					            <li class = "."main-product".">
					              <div class = "."marginProduct".">
					                  <img width="."300px"." height="."300px"." src="."$path"." >

					              </div>
					            </li >

					            <li class = "."main-product".">
													<center>
															<h1 class="."product-name"."> "."$name"," </h1>
															<br>
															<p class = "."product-name".">
																	Cost :....$ "."$cost"."
															</p>
															<br>
															<p class = "."product-name".">
																	Stock :...."."$stock"."
															</p>
															<br>
					                    <button class="."button1".">
					                      Agregar al carrito
					                    </button>
															<br><br>
													</center>
					            </li>
					      </ul>
					    </section>
					    </center>";

      }else{
				echo "NO  DATA";
			}
			$sql = "SELECT * FROM productos ORDER BY RAND() LIMIT 3";
			$result = $conn->query($sql);

			echo "<center>
						<section class="."products-section".">
						<ul class = "."product-list".">";
			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {
			       $nombre = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
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
						<a href= "add-customer-page.html">
							<button class="button1">
								LOGIN.
							</button>
						</a>

						<a href= "index.php">
							<button class="button1">
								GO HOMEPAGE..
							</button>
						</a>
		</center>
	</body>
</html>
