<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add customer result</title>
  </head>
  <body>
    <?php

      if(isset($_GET['email']))
      {
        $email = $_GET['email'];
      }
      if(isset($_GET['password']))
      {
        $password = $_GET['password'];
      }
      if(isset($_GET['firstname']))
      {
        $name = $_GET['firstname'];
      }
      if(isset($_GET['lastname']))
      {
        $lastname = $_GET['lastname'];
      }
      if(isset($_GET['phone']))
      {
        $phone = $_GET['phone'];
      }
      if(isset($_GET['address']))
      {
        $address = $_GET['address'];
      }
      if(isset($_GET['city']))
      {
        $city = $_GET['city'];
      }
      if(isset($_GET['state']))
      {
        $state = $_GET['state'];
      }
      if(isset($_GET['postal_code']))
      {
        $postal_code = $_GET['postal_code'];
      }
      if(isset($_GET['country']))
      {
        $country = $_GET['country'];
      }
      if(isset($_GET['credit_limit']))
      {
        $credit_limit = $_GET['credit_limit'];
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
      password) VALUES (".$name.", ".$lastname.", ".$phone.", ".$address.", ".
      $city.", ". $state.", ".$postal_code.", ".$country.", ".$credit_limit.", "
      .$email.", ".$password.")";
			$result = $conn->query($sql);
      if($result){
        echo "<label> insercion correcta </label>";
      } else {
        echo "<label> insercion incorrecta </label>";
      }

      $conn->close();
    ?>
  </body>
</html>
