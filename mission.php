<?php  
       session_start();
       $pageTitle = "ESI Conseil Scientifique";
       include "init.php";
?>
<body>
        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">Missions et Objectifs</h2>
              </div>
              <div class="col-md-8">
                <p class="lead">
                  Dans le cadre du service public d'enseignement supérieur, l'école assure des missions de formation supérieure et des missions de recherche scientifique et de développement technologique.<br>

                  En matière de formation supérieure, l'école a pour missions fondamentales dans son domaine de vocation :<br>
                     . d'assurer la formation des cadres (Ingénieur, Master, Magister, Docteur en sciences et Docteur en troisième cycle).<br>
                    . d'initier les étudiants aux méthodes de recherche et d'assurer la formation pour la recherche,<br>
                  de contribuer à la production et à la diffusion du savoir et des connaissances ; à leur acquisition et leur développement,
                  de participer à la formation continue.<br>
                  En matière de recherche scientifique et de développement technologique l'école a pour mission fondamentale :<br>
                  de contribuer à l'effort national de recherche scientifique et de développement technologique,<br>
                  de promouvoir le développement des sciences et des techniques,<br>
                  de participer au renforcement du potentiel technique national,<br>
                  de valoriser les résultats de la recherche scientifique et de diffuser l'information scientifique et technique,<br>
                  de participer au sein de la communauté internationale à l'échange des connaissances et à leur enrichissement.
                </p>
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
   
