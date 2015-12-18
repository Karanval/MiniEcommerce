<!DOCTYPE html>
<html>
<body>

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

$sql = "SELECT NOMBRE, IMG, PRECIO FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       $nombre = $row["NOMBRE"];
       $img_path = $row["IMG"];
       $precio = $row["PRECIO"];
       echo "<div class="."element".">
               <span class="."precio".">
                 ".  $precio."
               </span>

                 <img width="."200px"." height="."200px"." src=".$img_path." title="."queen1".">

               <div>
                   <br><br>
                   <a class="."titvideo".">".$nombre."</a>
               </div>
             </div>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>

</body>
</html>
