
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
		<?
			include ("search-product.html");
		?>
	</header>

	<center>
	<section class="products-section">
		<ul class="products-list">
			<?php
			include("functions.php");
			include("data-base-conexion.php");

			if(isset($_GET['pagina']) && $_GET['pagina']!=1){
  			$pagina = 0;
				for ($i=1; $i <$_GET['pagina'] ; $i++) {
					$pagina = $pagina + 9;
				}
			} else {
				$pagina = 1;
			}
			$sql = "SELECT NOMBRE, IMG, PRECIO FROM PRODUCTOS WHERE ACTIVO=1 LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			     while($row = $result->fetch_assoc()) {
						 $name = ($row["NOMBRE"]);
						 $img_path = $row["IMG"];
						 $cost = $row["PRECIO"];
						 $nameImage = urlencode($row["NOMBRE"]);
						 echo fun_show_product($name, $img_path,$cost,$nameImage);
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
				include ("data-base-conexion.php");
				$sql = "SELECT NOMBRE FROM PRODUCTOS WHERE ACTIVO =1";
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
