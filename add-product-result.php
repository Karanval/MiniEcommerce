<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/add-product.css">
	<title>
		Home
	</title>
	</head>

	<body>
		<header>
			<h1 class="title">Mini Ecommerce</h1>

		</header>
		<?php
				if ((($_FILES['file']["type"] == "image/gif") ||
						($_FILES['file']["type"] == "image/jpeg") ||
						($_FILES['file']["type"] == "image/png") ||
						($_FILES['file']["type"] == "image/pjpeg")) &&
						($_FILES['file']["size"] < 2000000)) {

							$path = "Images/";
							//Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
								if ($_FILES['file']["error"] > 0) {
									echo $_FILES['file']["error"] . "<br />";
								} else {
									// Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
									if (file_exists("Images/".$_FILES['file']["name"])) {
										echo $_FILES['file']["name"] . " THIS  PRODUCT EXISTS!!!";
									} else {
					 					// Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida

										if(isset($_POST['name'])){
							        $name = $_POST['name'];
							      } else{
							        $name = null;
							      }
							      if(isset($_POST['cost'])){
							        $cost = $_POST['cost'];
							      } else {
							        $cost = null;
							      }
							      if(isset($_POST['description'])){
							        $description = $_POST['description'];
							      } else {
							        $description = null;
							      }
							      if(isset($_POST['stock'])){
							        $stock = $_POST['stock'];
							      } else{
							        $stock = null;
							      }

										$path = $path.$_FILES['file']["name"];

							      $conn = new mysqli("localhost","root", "","miniecommerce");
							      if ($conn->connect_error) {
							           die("Connection failed: ".$conn->connect_error);
							      }

										if(!empty($name) && !empty($cost) && !empty($description)&& !empty($path)&& !empty($stock)){

											$sql = "INSERT INTO productos (NOMBRE,IMG,PRECIO,STOCK) VALUES ('".$name."', '".$path."', '".$cost."', '".$stock."')";
											$conn->query($sql);
											$conn->close();

											move_uploaded_file($_FILES['file']["tmp_name"],$path);
											echo "<center>
															<h2> PRODUCT REGISTERED </h2	>
															<section class="."forms".">
															<ul class ="."product-detail".">
																<li class = "."product".">
																	<h1> "."$name"."</h1>
																	<img width="."200px"." height="."200px"." src="."$path".">
																</li>
																<li class = "."product".">
																	<p class ="."par"."> Name :......."."$name"."</p>
																	<br>
																	<p class ="."par"."> Cost :......."."$cost"."</p>
																	<br>
																	<p class ="."par"."> file :......."."$path"."</p>
																	<br>
																	<p class ="."par"."> Description :......."."$description"."</p>
																	<br>
																	<p class ="."par"."> Stock :......."."$stock"."</p>
																</li>
															</ul>
															</section>
													 </center>";

							      } else {
											echo "<center>
															<p class= "."result-message".">Registry incorrect, please review </p>
														</center>";
							      }

					}
			}
		} else {
				// Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
				echo "<center>
								<p class= "."result-message".">Registry incorrect, please review </p>
							</center>";
		}
		echo "<center>
						<a href= "."add-product.html".">
							<button class="."button1".">
									TRY AGAIN.
							</button>
						</a>
						<br>
						<a href= "."index.php".">
							<button class="."button1".">
								GO HOMEPAGE.
							</button>
						</a>
					</center>";
    ?>

	</body>
</html>
