<?php  
       session_start();
       $pageTitle = "ESI Schéma de formation";
       include "init.php";
?>
<body>

        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row article">
              <div class="col-xs-12 heading">
                  <h2 class="h1 text-center">Schéma de formation</h2>
              </div>
                
              <div class="plan-formation col-md-4 col-md-offset-2">
                  <img src="images/plan-formation.jpg">
              </div>
                <br><br>
                
            </div>
          </div>
        </section>
        <!-- End Presentation -->

</body>
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?> 