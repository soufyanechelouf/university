<?php  
       session_start();
       $pageTitle = "ESI Débouchés";
       include "init.php";
?>
<body>

        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row article">
              <div class="col-xs-12 heading">
                  <h2 class="h1 text-center">Débouchés</h2>
              </div>
                
                <div class="admi-img col-md-3 col-md-offset-4">
                    <img src="images/esi1.png">
                </div>
                <br>
                <div class="col-xs-12">
                <h3>Carrières d'avenir</h3>
                <p class="lead">
                  Les débouchées attendues tant au niveau régional ou national (voir même international) sont énormes.
                </p>
                
                <p class="lead">
                   Le degré d'employabilité ne se limite pas à un secteur déterminé mais peut concerner tant au niveau régional que    national :
                </p>
             
                <ol type="I" class="lead">
                    <li>Les collectivités locales, les petites et moyennes entreprises, ou celles se déployant dans le domaine de la téléphonie  mobile, l'Internet, etc.</li>
                    <li> Possibilité de poursuite des études en Post graduation : Magister, Doctorat classique, le Master délivré permet aussi  l'accès à la formation doctorale troisième cycle. </li>
                    
                </ol>
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