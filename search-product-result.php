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
          $name_search = "%".$name."%";
					$sql = "SELECT *  FROM PRODUCTOS WHERE  ACTIVO =1  AND NOMBRE LIKE '".$name_search."'";
					$result = $conn->query($sql);
          if ($result->num_rows > 0) {
							$bproduct = false;
							echo "<center><h4>Search results for '".$name."' :  ".$result->num_rows."!!!! </h4></center><br>";
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
              echo "<center><h4>No search results!!!! </h4></center>";
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
		</form>
	</section>
	</body>
</html>
