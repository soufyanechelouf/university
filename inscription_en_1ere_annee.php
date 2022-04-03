<?php  
       session_start();
       $pageTitle = "ESI Inscription en 1ere anne de doctorat";
       include "init.php";
?>

<body>
        <!-- Start Inscription -->
        <section class="Inscreption">
        <div class="container">
               <div class="row">
                 <div class="col-xs-12 heading"><h2 class="h1 text-center">Inscription en 1ere anne de doctorat</h2></div>
                 <div class="col-lg-12"><p class="lead">Le candidat à une inscription en thèse, doit être titulaire du diplôme de magister, obtenu avec au minimum la mention assez bien.
                 La validation du sujet (thème) de la thèse de doctorat est prononcée par le conseil scientifique de l’ESI.</p></div>
                 <div class="col-lg-12"><h2>Inscripion en 1ere annee de doctorat:</h2></div>
                 <div class="col-lg-12">
                  <ul class="lead">
                    <li>Le dossier complet est déposé auprès du secrétariat de la direction de la post graduation et de la recherche (DPGR) pour son       introduction au conseil scientifique de l’établissement pour sa validation.</li>
                    <li>La période d’inscription en thèse va du 1ier au 30 octobre de chaque année.</li>
                    <li>Les dossiers incomplets ou déposés en dehors de cette période sont rejetés. Le dossier d’inscription doit être complété et visé par le directeur de thèse. L’inscription en thèse est prononcée par le conseil scientifique de l’établissement.</li>
                    <li>Le sujet doit alors faire l’objet d’un enregistrement dans le fichier central des thèses. Le signalement online des thèses de doctorat dans le site « Portail National de Signalement des Thèses » (PNST) est obligatoire pour l’inscription administrative (veuillez vous rapprocher de l'administration pour obtenir le compte d'accés).</li>
                  </ul>
                 </div>
                <div class="col-lg-12"><h2>Dossier d’inscription:</h2></div> 
                <div class="col-lg-6">
                  <ol class="lead">
                      <li>Une copie du diplôme de baccalauréat</li>
                      <li>Une copie du diplôme de graduation</li>
                      <li>Une copie du diplôme de la 1ère post-graduation (Magister)</li>
                      <li>Une copie de la Carte d'Identité Nationale</li>
                      <li>Curriculum Vitae</li>
                      <li>02 photos d'identité</li>
                      <li>Une quittance de 200 DA (Frais d'inscription)</li>
                      <li>Document PNST.</li>
                      <li>Fiche d'inscription en doctorat*</li>
                      <li>Formulaire de déclaration sur l'honneur légalisé à l'APC*</li>
                  </ol>
                    </div>
                   <div class="col-lg-6"><img src="images/images.jpg" alt="aa" class="img-responsive"></div>
                    <p class="col-lg-12 lead">* Les formulaires (9) et (10) doivent être dûment remplis par ordinateur et imprimés.</p>
                 
               </div>           
            </div>
          </section>  
          <!-- End Inscription -->
</body>      
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
