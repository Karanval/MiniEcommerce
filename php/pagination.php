<?php
include("functions.php");
$sql = "SELECT * FROM PRODUCTOS WHERE ACTIVO=1";
$result = fun_sql_query($sql);

 if ($result->num_rows > 0) {
    $rowsPerPage = 9;
    $pageNum = 1;
    if(isset($_POST['page'])) {
		sleep(1);
    	$pageNum = $_POST['page'];
	}

    $offset = ($pageNum - 1) * $rowsPerPage;
    $pages = ceil(($result->num_rows) / $rowsPerPage);

    $sql = "SELECT * FROM PRODUCTOS LIMIT $offset, $rowsPerPage";
    $result = fun_sql_query($sql);

    echo "<center>";
    echo "<section  class="."products-section".">";
	  echo "<ul  class="."products-list".">";
    while ($row = $result->fetch_assoc()) {
    	  $name = ($row["NOMBRE"]);
        $img_path = $row["IMG"];
        $cost = $row["PRECIO"];
        $nameImage = urlencode($row["NOMBRE"]);
        echo fun_show_product($name, $img_path,$cost,$nameImage);
	}
	echo "</ul>";
	echo "</section>";
	echo "</center>";

	 if ($pages > 1) {
	 					echo "<center>";
                        echo '<div class="pagination">';
                        echo '<ul>';
                            if ($pageNum != 1)
                                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Previous</a></li>';
                            	for ($i=1;$i<=$pages;$i++) {
                                    if ($pageNum == $i)
                                            echo '<li class="active"><a>'.$i.'</a></li>';
                                    else
                                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            }
                            if ($pageNum != $pages)
                                    echo '<li><a class="paginate" data="'.($pageNum+1).'">Next</a></li>';
                       echo '</ul>';
                       echo '</div>';
                       echo "</center>";
                    }
}else{
	echo "There are no products!!!!!";
}
?>
