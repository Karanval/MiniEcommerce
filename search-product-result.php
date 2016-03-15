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
    <center>
		<?php
				include ("search-product.html");
				include ("functions.php");

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
					include("data-base-conexion.php");
					if(isset($_POST['pagina']) && $_POST['pagina']!=1){
		  			$pagina = 0;
						for ($i=1; $i <$_POST['pagina'] ; $i++) {
							$pagina = $pagina + 9;
						}
					} else {
						$pagina = 1;
					}
          $name_search = "%".$name."%";
					$sql = "SELECT *  FROM PRODUCTOS WHERE NOMBRE LIKE '".$name_search."'";
					$result = $conn->query($sql);

          if ($result->num_rows > 0) {
							$bproduct = false;
							echo "<center><h4>Search results: ".$result->num_rows."!!!! </h4></center><br>";
							echo "<section class="."products-section".">";
              echo "<ul class="."products-list".">";
              while($row = $result->fetch_assoc()) {
                $name_product= ($row["NOMBRE"]);
                $img_path = $row["IMG"];
                $cost = $row["PRECIO"];
 						    $real_name = urlencode($row["NOMBRE"]);
								echo fun_show_product($name_product, $img_path,$cost,$real_name);
								}
              	echo "</ul>";
					} else {
              echo "<center><h4>There is no search results!!!! </h4></center>";
          }

				}else{
					if($bname == false){
						echo "<center>ERROR NAME!!!<br></center>";
					}
				}
				echo "</section>";
				echo "<center>
								<a href= "."index.php".">
									<button class="."button1".">
										GO HOMEPAGE.
									</button>
								</a>
							</center>";
    ?>
  </center>
	<section class="index-section">
		<form class="index" action="search-product-result.php" method="post">
			<?php
				include("data-base-conexion.php");
				$sql = "SELECT NOMBRE FROM PRODUCTOS WHERE ACTIVO =1";
				$result = $conn->query($sql);

				$cont = ceil(($result->num_rows) / 9);
				for ($i=1; $i <= $cont; $i++) {
					echo "<input type="."hidden"." name="."name"." value=".$name.">";
					echo "<input class="."index-item"." type="."submit"." name="."pagina"." value=".$i.">";
				}
			?>
		</form>
	</section>
	</body>
</html>
