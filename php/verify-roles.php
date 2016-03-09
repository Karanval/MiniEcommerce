<?php

$servername = "localhost";
$username = "root";
$db = "miniecommerce";
// Create connection
$conn = new mysqli($servername, $username, "", $db);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

#session_start();
if (isset($_SESSION["user"])){
  $user = $_SESSION["user"];
}
if(isset($user)){
  $sql_rol = "SELECT r.nombre_rol from usuario u, usr_rol ur, rol r where
   u.login = '".$user."' AND u.login = ur.login AND ur.id_rol = r.id_rol";
   $result = $conn->query($sql_rol);
   if ($result->num_rows > 0) {
     $row= $result->fetch_assoc();
     $rol = $row["nombre_rol"];
     if($rol == "administrador"){
       echo "menu administrador <br>";
       $sql_perm = "SELECT p.nombre from rol r, rol_perm rp, permisos p where
        r.nombre_rol = '".$rol."' AND r.ID_ROL = rp.ID_ROL AND p.ID_PERM = rp.ID_PERM";
        $result = $conn->query($sql_perm);
        if ($result->num_rows > 0) {
          echo "permiso(s): ";
          while($row = $result->fetch_assoc()) {
            #echo $row["nombre"]. "<br>";
            if($row["nombre"]=="agregarProducto"){
              echo "<a href="."add-product.html".">add product</a>";
            }
          }
        }
     }
   }
 }
?>
