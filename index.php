<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>
		Home
	</title>

		<script type="text/javascript" src="jquery-2.2.2.js"></script>
		<script>
		$(document).ready(function() {
		         $('#myForm').submit(function(){ //en el evento submit del fomulario
		           event.preventDefault();  //detenemos el comportamiento por default
		           var url = $(this).attr('action');  //la url del action del formulario
		           var datos = $(this).serialize(); // los datos del formulario
		           $.ajax({
		         type: 'POST',
		         url: url,
		         data: datos,
		         //beforeSend: mostrarLoader, //funciones que definimos más abajo
		         success: mostrarRespuesta  //funciones que definimos más abajo
		        });
		         });
		       });
		       function mostrarRespuesta (responseText){
		           //alert("Mensaje enviado: "+responseText);  //responseText es lo que devuelve la página contacto.php. Si en contacto.php hacemos echo "Hola" , la variable responseText = "Hola" . Aca hago un alert con el valor de response text
		           //$("#loader_gif").fadeOut("slow"); // Hago desaparecer el loader de ajax
		           $("#ajax_loader").html(responseText); // Aca utilizo la función append de JQuery para añadir el responseText  dentro del div "ajax_loader"
		       };

					 $(document).ready(function() {
			 		         $('#myForm2').submit(function(){ //en el evento submit del fomulario
			 		           event.preventDefault();  //detenemos el comportamiento por default
			 		           var url = $(this).attr('action');  //la url del action del formulario
			 		           var datos = $(this).serialize(); // los datos del formulario
			 		           $.ajax({
			 		         type: 'POST',
			 		         url: url,
			 		         data: datos,
			 		         //beforeSend: mostrarLoader, //funciones que definimos más abajo
			 		         success: mostrarRespuesta  //funciones que definimos más abajo
			 		        });
			 		         });
			 		       });
			 		       function mostrarRespuesta (responseText){
			 		           //alert("Mensaje enviado: "+responseText);  //responseText es lo que devuelve la página contacto.php. Si en contacto.php hacemos echo "Hola" , la variable responseText = "Hola" . Aca hago un alert con el valor de response text
			 		           //$("#loader_gif").fadeOut("slow"); // Hago desaparecer el loader de ajax
			 		           $("#ajax_loader").html(responseText); // Aca utilizo la función append de JQuery para añadir el responseText  dentro del div "ajax_loader"
			 		       };
		</script>

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
			<center>
					<form id="myForm" class="" action="search-product-result.php" method="post">
						<div style="margin: 10px" >
						<input class="flexsearch--input" type="search" name="name"placeholder="search">
							<select name="category">
								<option value="name">name</option>
								<option value="cost">Cost</option>
								<option value="description">Description</option>
							</select>
						<input class="flexsearch--submit" type="submit" value="&#10140;"/>
						</div>
					</form>
				</center>
	</header>

	<center id="ajax_loader">
		<?php
			include ("php/verify-roles.php");
		?>
	<section  class="products-section">

		<ul  class="products-list">
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

	<section class="index-section">
		<form id="myForm2" class="index" action="index.php">
			<?php
				include("php/paginacion.php");
			 ?>
		</form>
	</section>

	</center>

</body>
</html>
