<?php  
       session_start();
       $pageTitle = "ESI Présentation";
       include "init.php";
?>
<body>
        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">Présentation</h2>
              </div>
              <div class="col-md-3">
                <img src="images/salle-tp.png" alt="Presentation" class="img-responsive">
              </div>
              <div class="col-md-9 article">
                <h3>ÉCOLE DE PERFORMANCE</h3>
                <p class="lead">
                  Nombreux laboratoires pédagogiques et de recherche.</br>
                  Bibliothèque centrale et espace multimédia.</br>
                  Partenariat avec le Secteur socio-économique, les écoles nationales, les universités et à l'international.</br>
                  Cursus et programmes de formation modernes et évolutifs.</br>
                  Un parcours bi-diplômant (Ingéniorat + Master).
                </p>
              </div>
              <div class="col-md-3">
                <img src="images/form.png" alt="Presentation" class="img-responsive">
              </div>
              <div class="col-md-9 article">
                <h3>FORMATION D'EXCELLENCE</h3>
                <p class="lead">
                  Encadrement de rang magistral : Professeurs et maîtres de conférences ; nombreux jeunes docteurs motivés et hautement qualifiés.</br>
                  Intervenants externes spécialisés pour assurer des enseignements, des conférences ou des ateliers pratiques, à tous les niveaux de formation.</br>
                  Accompagnement personnalisé des élèves ingénieurs dans leur progression, leurs stages et leur projet professionnel.
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
   
