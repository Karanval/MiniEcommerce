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
      include("php/functions.php");
      if(!empty($login) && !empty($password)){

        $sql = "SELECT * FROM USUARIO WHERE LOGIN='".$login."' AND PASSWD ='$password'";
        $result = fun_sql_query($sql);
        if ($result->num_rows > 0) {
          session_start();
          if( isset($_SESSION["is_open"])){
            echo  " <center>There is already a session!!!!<br></center>";
          }else{

            $row = $result->fetch_assoc();
            $login = $row["LOGIN"];
            $name = $row["LOGIN"];
            $timeInit = date("Y-m-d H:i:s");
            $active = 1;
            $sql = "INSERT into SESION (LOGIN,FECHA_INI,ACTIVO) values ('".$login."','".$timeInit."','".$active."')";
            $result = fun_sql_query($sql);

            $_SESSION["login"] = $login;
            $_SESSION["user"]= $name;
            $_SESSION["timeInit"] = $timeInit;
            $_SESSION["is_open"] = true;
            echo "<center>".$login."<br></center>";
            echo "<center><p class="."result-message".">Login Successful </p></center>";
          }
        } else {

          echo "<center><p class="."result-message".">Incorrect Login </p></center>";
        }
      } else {
        echo "<center><p class="."result-message".">Enter Login and Password </p></center>";
      }
    ?>
    <br>
    <center>
    <a href="index.php">
      <button class="continue">Continue</button>
    </a>
  </center>
  </body>
</html>
