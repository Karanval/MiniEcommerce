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
				$costNum = false;
				if(strcmp($category,"cost") == 0){

					$range = $_POST['range'];
					$ls = explode("  ", $range);
					$numStart =$ls[0];
					$numEnd = $ls[1];
					$costNum = true;
				}
				if($bname || $costNum){

					if(strcmp($category,"name") == 0){
						$name_search = "%".$name."%";
						$sql = "SELECT *  FROM productos WHERE Activo=1 and NOMBRE LIKE '".$name_search."'";
					}
					if(strcmp($category,"cost") == 0){
						$sql = "SELECT *  FROM productos WHERE PRECIO BETWEEN '".$numStart."'  AND  '".$numEnd."' ";
					}
					if(strcmp($category,"description") == 0){
						$name_search = "%".$name."%";
						$sql = "SELECT *  FROM productos WHERE Activo=1 and DESCRIPCION LIKE '".$name_search."'";
					}

					$result = fun_sql_query($sql);

          if ($result->num_rows > 0) {
							$bproduct = false;
							#echo "<center><h4>Search results: ".$result->num_rows."!!!! </h4>
							#			</center><br>";

							echo "<section class="."products-section".">";
              echo "<ul class="."products-list".">";

							#$datas = $result->fetch_assoc();
							if ($result->num_rows > 0) {
								$cont = 0;
									 while($row = $result->fetch_assoc()) {
										 echo "<li class= "."product".">";
											 $name = ($row["NOMBRE"]);
											 $img_path = $row["IMG"];
											 $cost = $row["PRECIO"];
											 $stock = $row["STOCK"];
											 $desc = $row["DESCRIPCION"];
											 $nameImage = urlencode($row["NOMBRE"]);
											 $cont = $cont + 1;
											 echo pro_desc($name, $cost, $stock, $desc);
											 echo fun_show_product($name, $img_path,$cost,$nameImage, $cont);

											 echo "<button class=\"switch\" type=\"button\" onclick=\"change($cont)\"><i class=\"material-icons\">add</i></button>";
										 echo "</li>";
									 }
							} else {
									 echo "0 results";
							}
              	echo "</ul>";
					} else {
              echo "<center><h4>There is no search results!!!! </h4>
										</center>";
          }

				}else{
					if($bname == false){
						echo "<center>ERROR DATA!!!<br></center>";
					}
				}
				echo "</section>";
				echo "<center>
								<a href= "."index.php".">
									<button class="."button1".">
										Home
									</button>
								</a>
							</center>";
?>
