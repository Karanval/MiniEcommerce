<?php
require("functions.php");
$sql = "SELECT * FROM PRODUCTOS WHERE ACTIVO=1";
$result = fun_sql_query($sql);

if ($result->num_rows > 0) {
    $rowsPerPage = 9;
    $page = 1;
    if(isset($_GET['page'])) {
    	$page = $_GET['page'];
	  }

    $offset = ($page - 1) * $rowsPerPage;
    $pages = ceil(($result->num_rows) / $rowsPerPage);
    $sql = "SELECT * FROM PRODUCTOS WHERE ACTIVO=1 LIMIT 9 OFFSET $offset";
    $result = fun_sql_query($sql);

    echo "<center>";
    echo "<section  class="."products-section".">";
	  echo "<ul  class="."products-list".">";
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
	echo "</section>";
	echo "</center>";

	if ($pages > 1) {
		echo "<center>";
    for ($i=1; $i <= $pages; $i++) {
      echo "<a href="."index.php?page=".$i.">"."$i"." </a>";
    }
    if($page<$pages){
      echo "<a href="."index.php?page=".($page+1).">Next</a>";
    }
    echo "</center>";
  }
}else{
	echo "No results";
}
?>
