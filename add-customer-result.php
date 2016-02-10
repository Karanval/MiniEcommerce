<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add customer result</title>
    <link rel="stylesheet" type="text/css" href="css/new-custommer.css">
  </head>
  <body>
    <header class="result-header">
      <h1 class="title">Registry confirmation</h1>
    </header>
    <?php
      if(isset($_GET['email'])){
        $email = $_GET['email'];
      } else{
        $email = null;
      }
      if(isset($_GET['password'])){
        $password = $_GET['password'];
      } else {
        $password = null;
      }
      if(isset($_GET['confirm-password'])){
        $confirm_password = $_GET['confirm-password'];
      } else {
        $confirm_password = null;
      }
      if(isset($_GET['firstname'])){
        $name = $_GET['firstname'];
      } else {
        $name = null;
      }
      if(isset($_GET['lastname'])){
        $lastname = $_GET['lastname'];
      } else{
        $lastname = null;
      }
      if(isset($_GET['phone'])){
        $phone = $_GET['phone'];
      } else {
        $phone = null;
      }
      if(isset($_GET['address'])){
        $address = $_GET['address'];
      } else {
        $address = null;
      }
      if(isset($_GET['city'])){
        $city = $_GET['city'];
      } else {
        $city = null;
      }
      if(isset($_GET['state'])){
        $state = $_GET['state'];
      } else {
        $state = null;
      }
      if(isset($_GET['postal_code'])){
        $postal_code = $_GET['postal_code'];
      } else {
        $postal_code = null;
      }
      if(isset($_GET['country'])){
        $country = $_GET['country'];
      } else {
        $country = null;
      }
      if(isset($_GET['credit_limit'])){
        $credit_limit = $_GET['credit_limit'];
      } else {
        $credit_limit = null;
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

      $sql = "INSERT INTO cliente (NOMBRE, APELLIDO_s, TELEFONO,
      DIRECCION, CIUDAD, ESTADO, CODIGO_POSTAL, PAIS, LIMITE_CREDITO, email,
      password) VALUES ('".$name."', '".$lastname."', '".$phone."', '".$address."', '".
      $city."', '". $state."', '".$postal_code."', '".$country."', '".$credit_limit."', '"
      .$email."', '".$password."')";
      if(!empty($confirm_password) && !empty($password) && strcmp($confirm_password,$password)==0){
        if(!empty($name) && !empty($lastname) && !empty($address) && !empty($city)
        && !empty($country) && !empty($email)){
  			  $result = $conn->query($sql);
        }
      } else {
        echo "<p class="."result-message".">passwords don't match </p>";
      }
      if(isset($result) && $result){
        echo "<p class="."result-message"."> Registry correct </p>";
      } else {
        echo "<p class="."result-message"."> Registry incorrect, please review
        the mandatory fields </p>";
      }

      $conn->close();
    ?>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </body>
</html>
