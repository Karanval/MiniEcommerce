<!DOCTYPE html>
<html>
<head>
	<title>
		online
	</title>
    <link rel="STYLESHEET" type="text/css" href="index.css">
</head>
<body class="body" >

		<h1 >
			<center>
                MOKA   MINT
            </center>
			<br>
		</h1>

	<center>

            <div class="">
            <div class="">
            <fieldset class="reborde">
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

							$cont = 5;//para los indices 
							$sql = "SELECT NOMBRE, IMG, PRECIO FROM productos LIMIT 9 OFFSET $cont";
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


            </fieldset>

                <div class="">
                    <div class="">
                    </div>
                    <div class="">
                        <a class="" href="">1</a>
                        <a class="" href="other_link">2</a>
                        <a class="" href="other_link">3</a>
                        <a class="" href="other_link">4</a>
                    </div>

                    <div class="n">
                        <a class="" href="other_link">Siguiente</a>
                    </div>
            </div>
            </div>
            </div>



    </center>




</body>
</html>
Status
