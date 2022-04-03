<?php  
       session_start();
       $pageTitle = "ESI Magister";
       include "init.php";
?>
<body>
        <!-- Start  magister -->
        <section class="magister">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center"> deuxième année CS</h2>
              
                  
                </div>
            
              </div>  
            </div>         
          
        </section>
        <!-- End magister -->
  </body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
