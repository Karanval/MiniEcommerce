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
		<h3 class = "form-title" >REMOVE  PRODUCT</h3>

    <section class="products-section">
		<?php
        include("data-base-conexion.php");
          $products = count($_POST);
          $array = array_keys($_POST); // obtiene los nombres de las varibles
          $array_values = array_values($_POST);// obtiene los valores de las varibles
					if($products>=1){
					echo "Do you want realy delete this products?????";
					echo "<ul class="."products-list".">";
					echo "<form  action="."remove-product-end.php"." method="."post"." enctype="."multipart/form-data".">";
          for($i=0;$i<$products;$i++){
              $array[$i]=$array_values[$i];
              $sql = "SELECT * FROM PRODUCTOS WHERE ACTIVO=1 AND NOMBRE='".$array[$i]."'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                   // output data of each row
                     $row = $result->fetch_assoc();
                     $name = ($row["NOMBRE"]);
                     $img_path = $row["IMG"];
                     $cost = $row["PRECIO"];
      							 $real_name = urlencode($row["NOMBRE"]);
                     echo "
                     <li class="."product".">
										 		 <input type="."hidden"." name=".$i." value=".$real_name.">
                         <img width="."100px"." height="."100px"." src='".$img_path."' class="."product-img".">
                           <div clas="."product-texts".">
                             <p class="."product-name"." >
                               "."$name"."
                             </p><br>
                             <p class="."product-price"." >
                               Bs. ".$cost."
                             </p>
                           </div>
                     </li>";
                 }
            }
						echo "	</ul>
										</section >";

						echo "<input class= "."product-submit"." type = "."submit"." value="."REMOVE".">";
						echo "</form>
									</center>";
					}else{
						echo "Noting to delete now !!!!!!<br>";
						echo "	</ul>
										</section >
										<a href= "."remove-product.php".">
											<button class="."button1".">
													Select More.
											</button>
										</a>
										<br>
										<a href= "."index.php".">
											<button class="."button1".">
												Home.
											</button>
										</a>
									";
					}
					$conn->close();
    ?>
	</body>
</html>
