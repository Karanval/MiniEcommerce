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

				$bimage = false;
				$bname = false;
				$bcost = false;
				$bdescription = false;
				$bstock = false;
				$bproduct = false;


				if ((	($_FILES['file']["type"] == "image/gif") ||
					 ($_FILES['file']["type"] == "image/jpeg") ||
					 ($_FILES['file']["type"] == "image/png") ||
					 ($_FILES['file']["type"] == "image/pjpeg")) &&
					 ($_FILES['file']["size"] < 2000000)) {//tamaño en bits de la  imagen

					 $path = "Images/";
						$bimage = true;

				}else{
				}
				if(isset($_POST['name'])){
					$name = $_POST['name'];
					if(!empty($name)){
						$bname = true;
					}
				} else{
					$name = null;
				}
				if(isset($_POST['cost'])){
					$cost = $_POST['cost'];
					if(!empty($cost)){
						if($cost >=0){
							$bcost = true;
						}else{
							$bcost = false;
							echo "<center>Set positive numbers in cost field!!</center>";
						}
					}
				}else {
					$cost = null;
				}
				if(isset($_POST['description'])){
					$description = $_POST['description'];
					if(!empty($description)){
						$bdescription = true;
					}
				}else {
					$description = null;
				}

				if(isset($_POST['stock'])){
					$stock = $_POST['stock'];
					if(!empty($cost)){
						if((int)$stock >=0){
							$bstock = true;
						}else{
							$bstock = false;
							echo "<center>Set positive numbers in stock field!!</center>";
						}
					}
				}else{
					$stock = null;
				}


				if($bimage && $bname && $bcost && $bdescription && $bstock){
					//VERIFY IN TH DB IF EXISTS SAME PRODUCT..
					$conn = new mysqli("localhost","root", "","miniecommerce");
					if ($conn->connect_error) {
							 die("Connection failed: ".$conn->connect_error);
					}
					$sql = "SELECT *  FROM PRODUCTOS WHERE  ACTIVO=1 AND NOMBRE='".$name."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
							$bproduct = false;
							echo "<center>THE PRODUCT EXISTS!!! </center><br>";
					} else {//INSERT THE PRODUCT IN THE DATA BASE....
							$sql = "SELECT *  FROM PRODUCTOS WHERE  ACTIVO=0 AND NOMBRE='".$name."'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
									$sql = "UPDATE PRODUCTOS SET ACTIVO=1 WHERE NOMBRE='".$name."'";
									echo "<center>THE OLD PRODUCT!!! </center><br>";
							}else{
							$path = $path.$_FILES['file']["name"];
							//$conn = new mysqli("localhost","root", "","miniecommerce");
							if ($conn->connect_error) {
									 die("Connection failed: ".$conn->connect_error);
							}
							$sql = "INSERT INTO PRODUCTOS (NOMBRE,IMG,PRECIO,STOCK,DESCRIPCION,ACTIVO) VALUES ('".$name."', '".$path."', '".$cost."', '".$stock."','".$description."','1')";
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

					}}
					//$conn->close();
				}else{
					if($bimage == false){
						echo "<center>ERROR IMAGE!!!<br></center>";
					}
					if($bname == false){
						echo "<center>ERROR NAME!!!<br></center>";
					}
					if($bcost == false){
						echo "<center>ERROR COST!!!<br></center>";
					}
					if($bdescription == false){
						echo "<center>ERROR DESCRIPTION!!!<br></center>";
					}
					if($bstock == false){
						echo "<center>ERROR STOCK!!!<br></center>";
					}
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
