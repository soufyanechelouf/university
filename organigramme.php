<?php  
       session_start();
       $pageTitle = "ESI Conseil Scientifique";
       include "init.php";
?>
<body>
        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row article">
              <div class="col-xs-12 heading">
                  <h2 class="h1 text-center">Organigramme</h2>
              </div>
                <h3>Organisation de l’Ecole</h3>
                <p class="lead">
                  L’Ecole Supèrieur en Informatique (ESI Sidi Bel Abbès) est un établissement d’enseignement supérieur et de recherche scientifique :
                </p>
             
                <ul class="lead">
                    <li>dirigée par un <strong>Directeur de l’Ecole</strong></li>
                    <li>administrée par un <strong>Conseil d’administration</strong></li>
                    <li>et dotée d’un <strong>Conseil scientifique</strong></li>
                </ul>
                <br>
                <h3>Organisation administrative</h3>
                <ul>
                    <li>
                <p class="lead">
                  L’Ecole ENSI Sidi Bel Abbès est gérée par un <strong>Directeur de l’Ecole</strong>. Ce dernier est responsable du fonctionnement général de l’Ecole. Il est assisté dans sa tâche par :
                </p>
                    </li>
                <br>
                <ul class="lead">
                    <li>le Directeur adjoint chargé des enseignements, des diplômes et de la formation continues</li>
                    <li>le Directeur adjoint chargé de la formation doctorale, de la recherche scientifique et du développement technologique, de l'innovation et de la promotion de l'entreprenariat</li>
                    <li>le Directeur adjoint chargé des systèmes d'information et de la communication et des relations extérieures</li>
                    <li>le Secrétaire général</li>
                    <li>le Directeur de la Bibliothèque</li>
                    <li>les Chefs de département</li>
                    
                </ul>
                <br>
                
                    <li>
                <p class="lead">
                Le Directeur adjoint chargé des enseignements, des diplômes et de la formation continues est assisté par :
                </p>
                    </li>
                <ul class="lead">
                <li>un service des enseignements et de l’évaluation</li>
                <li>un service des stages</li>
                <li>un service des diplômes et des équivalences</li>
                </ul>
                <br>
                    <li>
                <p class="lead">
                Le Directeur adjoint chargé de la formation doctorale, de la recherche scientifique et du développement technologique, de l'innovation et de la promotion de l'entreprenariat est assisté par :
                </p>
                    </li>
                <br>
                <ul class="lead">
                <li>un service de la post-graduation et de la post-graduation spécialisée</li>
                <li>un service du suivi des activités de recherche et de la valorisation de ses résultats</li>
                </ul>
                <br>
                    <li>
                <p class="lead">
                Le Directeur adjoint chargé des systèmes d'information et de la communication et des relations extérieures est assisté par :
                </p>
                    </li>
                <br>
                <ul class="lead">
                <li>un service de la formation continue</li>
                <li>un service des relations extérieures</li>
                <li>un service des statistiques et de l’orientation</li>
                </ul>
                <br>
                    <li>
                <p class="lead">
                Le Secrétaire général est assisté par :
                </p>
                    </li>
                <br>
                <ul class="lead">
                <li>le Sous-directeur des personnels, de la formation et des activités culturelles et sportives</li>
                <li>le Sous-directeur des finances, de la comptabilité et des moyens</li>
                <li>un service des œuvres universitaires</li>
                </ul>
                <br>
                </ol>
            </div>
          </div>
        </section>
        <!-- End Presentation -->
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
