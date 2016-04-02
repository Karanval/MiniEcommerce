<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>
		Home
	</title>
		<script type="text/javascript" src="jquery-2.2.2.js"></script>
		<link rel="stylesheet" href="jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="css/search-product.css">
	  <script src="jquery-ui.js"></script>
		<script>

		$(function() {
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 0,
	      max: 300,
	      values: [ 100, 200 ],
	      slide: function( event, ui ) {
	        $( "#amount" ).val(ui.values[ 0 ] + " " + ui.values[ 1 ]);
	      }
	    });
	    $( "#amount" ).val( $("#slider-range").slider( "values", 0 ) +
	      " " + $( "#slider-range" ).slider( "values", 1));
	  });
		$(document).ready(function() {
		         $('#myForm').submit(function(){
		           event.preventDefault();
		           var url = $(this).attr('action');
		           var datos = $(this).serialize();
		           $.ajax({
		         type: 'POST',
		         url: url,
		         data: datos,
		         success: mostrarRespuesta
		        });
		         });
		       });
		       function mostrarRespuesta (responseText){
		           $("#ajax_loader").html(responseText);
		       };
		 $(document).ready(function() {
			 		         $('#myForm2').submit(function(){
			 		           event.preventDefault();
			 		           var url = $(this).attr('action');
			 		           var datos = $(this).serialize();
			 		           $.ajax({
			 		         type: 'POST',
			 		         url: url,
			 		         data: datos,
			 		         success: mostrarRespuesta
			 		        });
			 		         });
			 		       });
			 		       function mostrarRespuesta (responseText){
			 		           $("#ajax_loader").html(responseText);
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
					<div style="margin: 10px;">
						<div style="display: inline-block;">
								<div id="slider-range" style="width: 200px;"></div>
								<div style="display: inline-block;margin: 5px">
										<label for="amount" style="text-align: rigth;">Price range:</label>
								</div>
								<div style="display: inline-block;">
										<input name="range"  id="amount"  style="width: 100px;border:0; color:#f900f; font-weight:bold;">
								</div>
						</div>

						<div style="display: inline-block;">
							<input class="flexsearch--input" type="search" name="name"placeholder="search">
						</div>
						<div style="display: inline-block;">
								<select name="category">
									<option value="name">name</option>
									<option value="cost">Cost</option>
									<option value="description">Description</option>
								</select>
						</div>
						<div style="display: inline-block;">
							<input class="flexsearch--submit" type="submit" value="&#10140;"/>
						</div>
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
