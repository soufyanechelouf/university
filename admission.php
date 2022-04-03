<?php  
       session_start();
       $pageTitle = "ESI Admission";
       include "init.php";
?>
<body>


        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row article">
              <div class="col-xs-12 heading">
                  <h2 class="h1 text-center">Admission</h2>
              </div>
                
                <div class="admi-img col-md-3 col-md-offset-4">
                    <img src="images/images.jpg">
                </div>
                <br>
                <div class="col-xs-12">
                <h3>Condition d'accès</h3>
                <p class="lead">
                  L'accès à la classe préparatoire intégrée de l'ESI de Sidi Bel Abbes se fait sur classement à la base de la moyenne générale obtenue au baccalauréat suivant les priorités suivantes :
                </p>
             
                <ol type="I" class="lead">
                    <li>Priorité 1 : Bac série mathématiques et techniques mathématiques.</li>
                    <li>Priorité 2 : Bac série Sciences expérimentales.</li>
                    
                </ol>
                <br>
                <h3>Conditions supplémentaires</h3>
                
                <p class="lead">
                  Pour participer au classement, la moyenne calculée de Mathématiques, Physique et Moyenne Générale du Baccalauréat (Maths + Phys. + Moy BAC)/3 doit être :
                </p>
                <br>
                <ol type="I" class="lead">
                    <li>la priorité 1 : Supérieure ou égale à 13/20.</li>
                    <li>la priorité 2 : Supérieure ou égale à 14/20.</li>
                    
                </ol>
                <br>
                </div>
            </div>
          </div>
        </section>
        <!-- End Presentation -->

</body>
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?> 