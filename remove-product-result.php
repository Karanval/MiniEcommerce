<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/remove-product.css">
	<title>
		Home
	</title>
	</head>

	<body>
		<header>
			<h1 class="title">Mini Ecommerce</h1>

		</header>
		<?php

				$bname = false;

				if(isset($_POST['name'])){
					$name = $_POST['name'];
					if(!empty($name)){
						$bname = true;
					}
				} else{
					$name = null;
				}

				if($bname){
					//VERIFY IN TH DB IF EXISTS SAME PRODUCT..
					$conn = new mysqli("localhost","root", "","miniecommerce");
					if ($conn->connect_error) {
							 die("Connection failed: ".$conn->connect_error);
					}

					$sql = "SELECT *  FROM PRODUCTOS WHERE NOMBRE='".$name."'";
					$result = $conn->query($sql);

					if ($result->num_rows == 0) {
							$bproduct = false;
							echo "<center>THE PRODUCT NOT EXISTS!!! </center><br>";
					} else {//INSERT THE PRODUCT IN THE DATA BASE....
							$conn = new mysqli("localhost","root", "","miniecommerce");
							if ($conn->connect_error) {
									 die("Connection failed: ".$conn->connect_error);
							}
							$sql = "DELETE FROM PRODUCTOS  WHERE  NOMBRE ='".$name."'";
							$conn->query($sql);
							$conn->close();

							echo "<center>
											<h2> PRODUCT REMOVED </h2	>
									 </center>";

					}
					//$conn->close();
				}else{
					if($bname == false){
						echo "<center>ERROR NAME!!!<br></center>";
					}
				}
				echo "<center>
								<a href= "."remove-product.html".">
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
