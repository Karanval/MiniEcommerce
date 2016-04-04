<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="css/search-product.css">
		<link rel="stylesheet" href="css/jquery-ui.css">

		<script type="text/javascript" src="js/jquery-2.2.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>

		<script type="text/javascript" src="js/functions.js">	</script>

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
				<?php include ("php/add-login.php"); ?>
		</div>
		<h1 class="title"> Mini e-commerce </h1>
		<?php include("search-product.html"); ?>
	</header>

	<center id = "content">
		 <?php require('php/pagination.php'); ?></div>
	</center>
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
