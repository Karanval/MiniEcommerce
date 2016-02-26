
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
		<div >
				<?php
				 	include ("add-login.php");
				?>
		</div>
		<h1 class="title">
				Mini e-commerce
		</h1>
	</header>
	<center>
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

		session_start();
		if (isset($_SESSION["user"])){
			$user = $_SESSION["user"];
		} else {
			$user = "karo";
		}
		$sql_rol = "SELECT r.nombre_rol from usuario u, usr_rol ur, rol r where
		 u.login = '".$user."' AND u.login = ur.login AND ur.id_rol = r.id_rol";
		 $result = $conn->query($sql_rol);
		 if ($result->num_rows > 0) {
			 $row= $result->fetch_assoc();
			 $rol = $row["nombre_rol"];
			 echo "rol: ".$rol."<br>";
			 if($rol == "administrador"){
				 echo "menu administrador <br>";
				 $sql_perm = "SELECT p.nombre from rol r, rol_perm rp, permisos p where
					r.nombre_rol = '".$rol."' AND r.ID_ROL = rp.ID_ROL AND p.ID_PERM = rp.ID_PERM";
					$result = $conn->query($sql_perm);
					if ($result->num_rows > 0) {
						echo "permiso(s): ";
						while($row = $result->fetch_assoc()) {
							#echo $row["nombre"]. "<br>";
							if($row["nombre"]=="agregarProducto"){
								echo "<a href="."add-product.html".">add product</a>";
							}
						}
					}
			 }
		 }
		?>
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
			$conn = new mysqli($servername, $username, "", $db);
			// Check connection
			if ($conn->connect_error) {
			     die("Connection failed: " . $conn->connect_error);
			}

			//$pagina = 3;//para los indices
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM PRODUCTOS LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     // output data of each row
			     while($row = $result->fetch_assoc()) {

			       $nombre = ($row["NOMBRE"]);
			       $img_path = $row["IMG"];
			       $precio = $row["PRECIO"];
						 $nameImage = urlencode($row["NOMBRE"]);
			       echo "
						 				<li class="."product".">
							 				<a href="."product-detail.php?name=".$nameImage." class="."product-link".">
							 					<img width="."200px"." height="."200px"." src='".$img_path."' class="."product-img".">
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
				$sql = "SELECT * FROM PRODUCTOS";
				$result = $conn->query($sql);

				$cont = ceil(($result->num_rows) / 9);
				for ($i=1; $i <= $cont; $i++) {
					echo "<input class="."index-item"." type="."submit"." name="."pagina"." value=".$i.">";
				}
			?>
		</form>
	</section>

</body>
</html>
