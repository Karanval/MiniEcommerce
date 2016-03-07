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
		<form class = ".new-product-form" action="remove-product-result.php" method="post" enctype="multipart/form-data">
    <section class="products-section">
      <ul class="products-list">
        <?php

        if(isset($_GET['pagina']) && $_GET['pagina']!=1){
          $pagina = 0;
          for ($i=1; $i <$_GET['pagina'] ; $i++) {
            $pagina = $pagina + 9;
          }
        } else {
          $pagina = 1;
        }
        $servername = "localhost";
        $username = "root";
        $db = "miniecommerce";
        // Create connection
        $conn = new mysqli($servername, $username, "", $db);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

        //$pagina = 3;//para los indices
        $sql = "SELECT NOMBRE, IMG, PRECIO FROM PRODUCTOS WHERE ACTIVO=1 ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
						 $count = 0;
             while($row = $result->fetch_assoc()) {
               $name = ($row["NOMBRE"]);
               $img_path = $row["IMG"];
               $cost = $row["PRECIO"];
							 $real_name = urlencode($row["NOMBRE"]);
							 $pname = "product".$count;
               echo "
                      <li class="."product".">

                          <img width="."100px"." height="."100px"." src='".$img_path."' class="."product-img".">
                            <div clas="."product-texts".">
                            	<p class="."product-name"." >
                              	"."$name"."
                            	</p><br>
                            	<p class="."product-price"." >
                              	Bs. ".$cost."
                            	</p><br>
															<input type="."checkbox"." name= '".$pname."' value='".$name."'> Delete<br>
                            </div>
                      </li>
                    ";
								$count++;
             }
        } else {
             echo "0 results";
        }
        $conn->close();
        ?>
      </ul>
    </section >
		<input class="product-submit" type = "submit" value="Remove product">
		</form>
    </center>
	</body>
</html>
