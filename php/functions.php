<?php

     function fun_show_product($name, $img_path,$cost,$nameImage,$cont){
       $id = "product-img-".$cont;
       $chain = "<div class="."product-ima"." id=\"$id\">

                  <img src='".$img_path."' class="."product-img".">
                    <div class="."product-texts".">
                    <p class="."product-name"." >
                      "."$name"."
                    </p>
                    <p class="."product-price"." >
                      Bs. ".  $cost."
                    </p>
                    </div>
                </a>

              </div>
            ";
      return $chain;
     }

     function pro_desc($name, $cost, $stock, $desc){
      $chain = "<div class="."product-des".">Name: ".$name." <br>Cost: ".$cost." <br>Stock: ".$stock;
      if(isset($desc)){
        $chain = $chain. " <br>Desc: ".$desc."<br>";
      }
      if(isset($_SESSION["user"]) ){
        $login = $_SESSION["user"];
        #$func ="addToCart(".$name.", ".$login.")";
        $chain = $chain . "<button class=\"add-to-cart\" type="."button"." onclick = addToCart('".$name."','".$login."')>Agregar al carrito</button>";
      }
      $chain = $chain . " </div>";
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
