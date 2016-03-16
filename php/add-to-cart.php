<?php
  if(isset($_GET['name'])){
    $nomPro = $_GET['name'];
  } else{
    $nomPro = null;
  }
  if(isset($_GET['login'])){
    $login = $_GET['login'];
  } else {
    $login = null;
  }

  $conn = new mysqli("localhost","root", "","miniecommerce");
  if ($conn->connect_error) {
       die("Connection failed: ".$conn->connect_error);
  }
  if(isset($nomPro) && isset($login)){
    $control = "SELECT nom_prod FROM carrito WHERE login = '".$login."' AND nom_prod='".$nomPro."'";
    $result = $conn->query($control);
    if(!($result->num_rows > 0)){
      $sql="INSERT into carrito (login, nom_prod) values ('".$login."', '".$nomPro."') ";
      $result = $conn->query($sql);
      if($result){
        echo '<script type="text/javascript">alert("added to cart")</script>';
      } else {
        echo "error";
      }
    }
  }
  $conn->close();
?>
