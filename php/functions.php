<?php

     function fun_sql_query($sql){
       $result;
       $servername = "localhost";
       $username = "root";
       $db = "miniecommerce";
       $conn = new mysqli($servername, $username, "", $db);
       if ($conn->connect_error) {
          echo "Connection failed: " . $conn->connect_error;
        }
       $result = $conn->query($sql);
       $conn->close();

       return $result;
     }

     function fun_show_product($name, $img_path,$cost,$nameImage){
       $chain = "
              <li class="."product".">
                <a href="."product-detail.php?name=".$nameImage." class="."product-link".">
                  <img width="."200px"." height="."200px"." src='".$img_path."' class="."product-img".">
                    <div clas="."product-texts".">
                    <p class="."product-name"." >
                      "."$name"."
                    </p>
                    <p class="."product-price"." >
                      Bs. ".  $cost."
                    </p>
                </a>
                    </div>
              </li>
            ";
      return $chain;
     }

     function fun_show_main_product($name,$path, $cost,$stock,$description){
       $chain = "  <center>
           <section
           class="."principal-product".">
             <ul class = "."product-detail".">
                   <li class = "."main-product".">
                     <div class = "."marginProduct".">
                         <img width="."300px"." height="."300px"." src='".$path."' >
                     </div>
                   </li >
                   <li class = "."main-product".">
                       <center>
                           <h1 class="."product-name"."> "."$name"." </h1>
                           <br>
                           <p class = "."product-name".">
                               Cost :    $ "."$cost"."
                           </p>
                           <br>
                           <p class = "."product-name".">
                               Stock :    "."$stock"."
                           </p>
                           <br>
                           <p class = "."product-name".">
                               Description :    "."$description"."
                           </p>
                           <br>
                           <button class="."button1".">
                             Agregar al carrito
                           </button>
                           <br><br>
                       </center>
                   </li>
             </ul>
           </section>
           </center>";
           return $chain;
     }
     function fun_show_product_remove($name,$img_path,$cost){
       $chain = "
       <li class="."product".">
           <img width="."100px"." height="."100px"." src='".$img_path."' class="."product-img".">
             <div clas="."product-texts".">
               <p class="."product-name"." >
                 "."$name"."
               </p><br>
               <p class="."product-price"." >
                 Bs. ".$cost."
               </p>
             </div>
       </li>";
       return $chain;
     }


     function fun_show_product_remove2($name,$img_path,$cost,$pname){
       $chain =  "
              <li class="."product".">
                  <img width="."100px"." height="."100px"." src='".$img_path."' class="."product-img".">
                    <div clas="."product-texts".">
                      <p class="."product-name"." >
                        "."$name"."
                      </p><br>
                      <p class="."product-price"." >
                        Bs. ".$cost."
                      </p><br>
                      <input type="."checkbox"." name= '".$pname."' value='".$name."'> Delete<br>
                    </div>
              </li>
            ";
       return $chain;
     }
?>
