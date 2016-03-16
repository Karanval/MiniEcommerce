<?php

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
         <section class="."principal-product".">
           <ul class = "."product-details".">
             <li class = "."main-product".">
               <div class = "."marginProduct".">
                   <img width="."300px"." height="."300px"." src='".$path."' >

               </div>
             </li >

             <li class = "."main-product".">
                 <center>
                     <h1 class="."product-detail"."> "."$name"," </h1>
                     <br>
                     <p class = "."product-detail".">Cost : Bs. "."$cost"."</p>
                     <br>
                     <p class = "."product-detail".">Stock : "."$stock"."	</p>
                     <br>";
       if(isset($description)){
         echo "<p class = "."product-detail".">Description : "."$description"."</p>
         <br>";
       }
       if(isset($_SESSION["user"]) ){
         $login = $_SESSION["user"];
         $func ="addToCart(".$name.", ".$login.")";
         echo "<a href="."product-detail.php?name=".$name."&login=".$login.">";
         #echo "<button class=add_to_cart type=button onclick =addToCart('".$name."','".$login."')>Agregar al carrito</button>";
         echo "<button class=add_to_cart>Agregar al carrito</button>";
         echo "</a>";
       }
                 echo"		<br><br>
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
