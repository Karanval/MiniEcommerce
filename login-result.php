<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Result</title>
    <link rel="stylesheet" type="text/css" href="css/new-custommer.css">
  </head>
  <body>
    <header class="result-header">
      <h1 class="title">Mini Ecommerce</h1>
    </header>
    <?php

      if(isset($_POST['login'])){
        $login = $_POST['login'];
      } else{
        $login = null;
      }
      if(isset($_POST['password'])){
        $password = $_POST['password'];
      } else {
        $password = null;
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

      if(!empty($login) && !empty($password)){
        $sql = "SELECT LOGIN, PASSWD FROM usuario WHERE LOGIN='".$login."' AND PASSWD ='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<p class="."result-message".">Login Successful </p>";
        } else {
            echo "<p class="."result-message".">Incorrect Login </p>";
        }
      } else {
        echo "<p class="."result-message".">Enter Login AND Password </p>";
      }
      $conn->close();
    ?>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </body>
</html>
