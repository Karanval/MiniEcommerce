<?php
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
								echo fun_show_product($name_product, $img_path,$cost,$real_name);
								echo "end";
								}
								echo "endssss";
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
