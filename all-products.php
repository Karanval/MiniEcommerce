<?php
  include ("php/verify-roles.php");
?>
<section  class="products-section">
<ul  class="products-list">
  <?php
  include("php/functions.php");



  if(isset($_POST['pagina'])){
    echo "I'm here !!!";
    echo $_POST['pagina']."<br><br><br>";
  }

  if(isset($_POST['pagina']) && $_POST['pagina']!=1){
    $pagina = 0;
    for ($i=1; $i <$_POST['pagina'] ; $i++) {
      $pagina = $pagina + 9;
    }
  } else {
    $pagina = 1;
  }

  $sql = "SELECT NOMBRE, IMG, PRECIO FROM PRODUCTOS WHERE ACTIVO=1 LIMIT 9 OFFSET $pagina";
  $result = fun_sql_query($sql);
  if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
         $name = ($row["NOMBRE"]);
         $img_path = $row["IMG"];
         $cost = $row["PRECIO"];
         $nameImage = urlencode($row["NOMBRE"]);
         echo fun_show_product($name, $img_path,$cost,$nameImage);
       }
  } else {
       echo "0 results";
  }
  ?>
</ul>
</section >


<section class="index-section">
  <form id = "myForm2" class="index" action="all-products.php" method="post">
      <?php include("php/paginacion.php");?>
  </form>
</section>
