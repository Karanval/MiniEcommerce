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
				include ("php/functions.php");

				$bname = false;
				if(isset($_POST['name'])){
					$name = $_POST['name'];
					if(!empty($name)){
						$bname = true;
					}
				} else{
					$name = null;
				}

				$bcategory = false;
				if(isset($_POST['category'])){
					$category = $_POST['category'];
					if(!empty($category)){
						$bcategory = true;
					}
				} else{
					$category = null;
				}

				$costNum = true;

				if(strcmp($category,"cost") == 0){
					if(is_numeric($name)) {
					}else{
						$costNum = false;
					}
				}


				if($bname && $costNum){
					include("php/data-base-conexion.php");
					if(isset($_POST['pagina']) && $_POST['pagina']!=1){
		  			$pagina = 0;
						for ($i=1; $i <$_POST['pagina'] ; $i++) {
							$pagina = $pagina + 9;
						}
					} else {
						$pagina = 1;
					}

					if(strcmp($category,"name") == 0){
						$name_search = "%".$name."%";
						$sql = "SELECT *  FROM PRODUCTOS WHERE activo=1 and NOMBRE LIKE '".$name_search."'";
					}
					if(strcmp($category,"cost") == 0){
						$name_search = $name;
						$sql = "SELECT *  FROM PRODUCTOS WHERE activo=1 and PRECIO LIKE '".$name_search."'";
					}
					if(strcmp($category,"description") == 0){
						$name_search = "%".$name."%";
						$sql = "SELECT *  FROM PRODUCTOS WHERE activo=1 and DESCRIPCION LIKE '".$name_search."'";
					}
					//$sql = "SELECT *  FROM PRODUCTOS WHERE activo=1 and NOMBRE LIKE '".$name_search."'";
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
								echo fun_show_product($name_product, $img_path,$cost,$real_name,12);
								}
              	echo "</ul>";
					} else {
              echo "<center><h4>There is no search results!!!! </h4></center>";
          }

				}else{
					if($bname == false || $costNum==false){
						echo "<center>ERROR DATA!!!<br></center>";
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
	</section>
	</body>
</html>