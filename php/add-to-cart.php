<?php
  if(isset($_GET["login"])){
    $login = $_GET["login"];
  }
  if(isset($_GET["nomPro"])){
    $nomPro = $_GET["nomPro"];
  }
  $conn = new mysqli("localhost","root", "","miniecommerce");
  if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
  }
  $control = "SELECT nom_prod FROM carrito WHERE login = '".$login."' AND nom_prod='".$nomPro."'";
  $result = $conn->query($control);
  if(!($result->num_rows > 0)){
    $sql="INSERT into carrito (login, nom_prod) values ('".$login."', '".$nomPro."') ";
    $result = $conn->query($sql);
    if($result){
      echo "added to cart";
    } else {
      echo "error on insert";
    }
  } else {
    echo "Product already in Cart";
  }
  $conn->close();
?>
