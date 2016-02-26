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
      if(isset($_POST['login'])){
        $login = $_POST['login'];
      } else {
        $login = null;
      }
      if(isset($_POST['password'])){
        $password = $_POST['password'];
      } else {
        $password = null;
      }
      if(isset($_POST['confirm-password'])){
        $confirm_password = $_POST['confirm-password'];
      } else {
        $confirm_password = null;
      }
      if(isset($_POST['firstname'])){
        $name = $_POST['firstname'];
      } else {
        $name = null;
      }
      if(isset($_POST['lastname'])){
        $lastname = $_POST['lastname'];
      } else{
        $lastname = null;
      }
      if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
      } else {
        $phone = null;
      }
      if(isset($_POST['address'])){
        $address = $_POST['address'];
      } else {
        $address = null;
      }
      if(isset($_POST['city'])){
        $city = $_POST['city'];
      } else {
        $city = null;
      }
      if(isset($_POST['state'])){
        $state = $_POST['state'];
      } else {
        $state = null;
      }
      if(isset($_POST['postal_code'])){
        $postal_code = $_POST['postal_code'];
      } else {
        $postal_code = null;
      }
      if(isset($_POST['country'])){
        $country = $_POST['country'];
      } else {
        $country = null;
      }
      if(isset($_POST['credit_limit'])){
        $credit_limit = $_POST['credit_limit'];
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
      if(!empty($login)){
        $exists_sql = "SELECT * FROM usuario WHERE login='".$login."'";
        $result = $conn->query($exists_sql);
        $exists = 0;
        if ($result->num_rows > 0) {
              $exists = 1;
        }
        #if($exists == 1) {
        if($exists==0)  {
          $insert_sql = "INSERT INTO usuario (NOMBRE, APELLIDO_s, TELEFONO,
          DIRECCION, CIUDAD, ESTADO, CODIGO_POSTAL, PAIS, LIMITE_CREDITO, LOGIN,
          PASSWD) VALUES ('".$name."', '".$lastname."', '".$phone."', '".$address."', '".
          $city."', '". $state."', '".$postal_code."', '".$country."', '".$credit_limit."', '"
          .$login."', '".$password."')";
          if(!empty($confirm_password) && !empty($password) && strcmp($confirm_password,$password)==0){
            if(!empty($name) && !empty($lastname) && !empty($address) && !empty($city)
            && !empty($country)){
      			  $result = $conn->query($insert_sql);
              if(isset($result) && $result){
                echo "<p class="."result-message"."> Registry correct </p>";
              } else {
                echo "<p class="."result-message"."> Registry incorrect </p>";
              }
            } else {
              echo "<p class="."result-message"."> Registry incorrect, please review
              the mandatory fields </p>";
            }
          } else {
            echo "<p class="."result-message".">passwords don't match </p>";
          }

        } else {
          echo "<p class="."result-message"."> The login already exists </p>";
        }
      } else {
        echo "<p class="."result-message"."> Enter login </p>";
      }
      $conn->close();
    ?>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </body>
</html>
