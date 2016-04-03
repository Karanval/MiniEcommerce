
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>
		Home
	</title>
</head>
<body>
	<header>
		<div class="right-side">
			  <a class="cart-link" href="cart.php">
          <img width="30px" height="30px" src="images/cart.png" class="icono-carrito">
     		</a>
				<?php
				 	include ("php/add-login.php");
				?>
		</div>
		<h1 class="title">
				Mini e-commerce
		</h1>
		<?php
			include ("search-product.html");
		?>
	</header>

	<center>
		<?php
			include ("php/verify-roles.php");
		?>
	<section class="products-section">
		<ul class="products-list">
			<?php
			include("php/functions.php");
			include("php/data-base-conexion.php");

			if(isset($_GET['pagina']) && $_GET['pagina']!=1){
  			$pagina = 0;
				for ($i=1; $i <$_GET['pagina'] ; $i++) {
					$pagina = $pagina + 9;
				}
			} else {
				$pagina = 1;
			}
			$sql = "SELECT NOMBRE, IMG, PRECIO, STOCK, DESCRIPCION FROM PRODUCTOS WHERE ACTIVO=1 LIMIT 9 OFFSET $pagina";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$cont = 0;
			     while($row = $result->fetch_assoc()) {
						 echo "<li class= "."product".">";
							 $name = ($row["NOMBRE"]);
							 $img_path = $row["IMG"];
							 $cost = $row["PRECIO"];
							 $stock = $row["STOCK"];
							 $desc = $row["DESCRIPCION"];
							 $nameImage = urlencode($row["NOMBRE"]);
							 $cont = $cont + 1;
							 echo pro_desc($name, $cost, $stock, $desc);
							 echo fun_show_product($name, $img_path,$cost,$nameImage, $cont);

							 echo "<button class=\"switch\" type=\"button\" onclick=\"change($cont)\"><i class=\"material-icons\">add</i></button>";
						 echo "</li>";
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
				include("php/paginacion.php");
			 ?>
		</form>
	</section>

<script>
function change(cont) {
	var id = "product-img-"+cont;
	var elemento =  document.getElementById(id);
	//alert (elemento.style.opacity);
  if(elemento.style.display==="none"){
      elemento.style.display = "block";
  }else {
      elemento.style.display = "none";
  }
}
function addToCart(name, login){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				alert (xhttp.responseText);
			}
		};
		xhttp.open("GET", "php/add-to-cart.php?nomPro="+name+"&login="+login, true);
		xhttp.send();
}
</script>
</body>
</html>
