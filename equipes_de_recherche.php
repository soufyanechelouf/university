<?php  
       session_start();
       $pageTitle = "ESI Equipe De Recherche";
       include "init.php";
?>
<body>
        <!-- Start equipde de recherche -->
          <section class="equipe">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 heading">
                      <h2 class="h1 text-center">Equipes de Recherche </h2>
                    </div>
                   <div class="col-xs-12">
                       <div class="col-xs-6">
                         <div class="col-xs-12">
                              <img src="images/cisco.jpg" alt="aa" class="img-responsive IMG1">
                         </div>
                         <div class="col-xs-12 A">
                              <h2 class="B">CISCO</h2>
                              <p class="lead">Computational Intelligence and Soft Computing, dirigée par le Pr. Rahmoun Abdellatif.</p></br>
                              <a href="http://www.esi-sba.dz/fr/index.php/labri-computational-intelligence-and-soft-computing">Read more: CISCO</a>
                          </div>
                      </div>
                      <div class="col-xs-6">
                       <div class="col-xs-12"><img src="images/cisco.jpg" alt="aa" class="img-responsive IMG1"></div><div class="col-xs-12 A"><h2 class="B">DASE</h2><p class="lead">Data and Software Engineering, dirigée par le Dr. Amar Bensaber Djamel.</p></br><a href="http://www.esi-sba.dz/fr/index.php/labri-data-and-software-engineering">Read more: DASE</a></div></div>
                    </div>
                   <div class="col-xs-12">
                       <div class="col-xs-6"><div class="col-xs-12"><img src="images/cisco.jpg" alt="aa" class="img-responsive IMG1"></div><div class="col-xs-12 A"><h2 class="B">ISEWED</h2><p class="lead">Information Systems Engineering and Web Data, dirigée par le Pr. Malki Mimoun.</p></br><a href="http://www.esi-sba.dz/fr/index.php/labri-information-systems-engineering-and-web-data">Read more: ISEXED</a></div></div>
                      <div class="col-xs-6"><div class="col-xs-12"><img src="images/cisco.jpg" alt="aa" class="img-responsive IMG1"></div><div class="col-xs-12 A"><h2 class="B">SOC</h2><p class="lead">Service Oriented Computing, dirigée par le Pr. Benslimane Sidi Mohamed,</p></br><a href="http://www.esi-sba.dz/fr/index.php/labri-service-oriented-computing">Read more: SOC</a></div></div>
                    </div>
                </div>
             </div>
          </section>
        <!-- Start equipde de recherche -->      
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
