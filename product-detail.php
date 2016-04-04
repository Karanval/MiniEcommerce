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
			<?
				include ("search-product.html");
			?>
		</header>

		<div id="txtHint"></div>
			<?php include ("php/add-to-cart.php"); ?>
		<?php
			include("php/functions.php");

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

      include("php/data-base-conexion.php");

			$sql = "SELECT * FROM productos WHERE NOMBRE = '".$name."'";
      if(!empty($name)){
  			  $result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$name = $row["NOMBRE"];
					$path = $row["IMG"];
					$cost = $row["PRECIO"];
					$stock = $row["STOCK"];
					$description = $row["DESCRIPCION"];

					#echo fun_show_main_product($name,$path, $cost,$stock,$description);
					echo "  <center>
				    <section class="."principal-product".">
				      <ul class = "."product-details".">
		            <li class = "."main-product".">
		              <div class = "."marginProduct".">
		                  <img width="."300px"." height="."300px"." src='".$path."' >

		              </div>
		            </li >

		            <li class = "."main-product".">
										<center>
												<h1 class="."product-detail"."> "."$name"," </h1>
												<br>
												<p class = "."product-detail".">Cost : Bs. "."$cost"."</p>
												<br>
												<p class = "."product-detail".">Stock : "."$stock"."	</p>
												<br>";
					if(isset($description)){
						echo "<p class = "."product-detail".">Description : "."$description"."</p>
						<br>";
					}
					if(isset($_SESSION["user"]) ){
						$login = $_SESSION["user"];
						$func ="addToCart(".$name.", ".$login.")";
						echo "<a href="."product-detail.php?name=".$name."&login=".$login.">";
						#echo "<button class=add_to_cart type=button onclick =addToCart('".$name."','".$login."')>Agregar al carrito</button>";
						echo "<button class=add_to_cart>Agregar al carrito</button>";
						echo "</a>";
					}
										echo"		<br><br>
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
			       $name = $row["NOMBRE"];
			       $img_path = $row["IMG"];
			       $cost = $row["PRECIO"];
						 $nameImage = urlencode($row["NOMBRE"]);
			       echo fun_show_product($name, $img_path,$cost,$nameImage);
			     }
			} else {
			     echo "NO DATA...";
			}

			echo "</section>
						</ul>
						</center>";
      $conn->close();
    ?>
		<a class="home-link" href= "index.php">
			<button class="home-button">Home</button>
		</a>
	</body>
</html>
