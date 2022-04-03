<?php  
       session_start();
       $pageTitle = "ESI Representation";
       include "init.php";
?>
<body>
      <section class="magister">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">Création du Nouveau Laboratoire de Recherche</h2>
              </div>
            <div class="col-lg-6">
             <p class="lead"> Le Laboratoire de Recherche en Informatique de Sidi Bel-Abbes (LabRI-SBA) a été créé au sein de  l’École Supérieure en Informatique de Sidi Bel-Abbes par l’arrêté ministériel n° 1218 du 02 Décembre  2015.</p></br>   
             <p class="lead"> L’ESI de Sidi Bel-Abbes a l’ambition par la création de ce nouveau laboratoire de recherche en  informatique de renforcer son statut de pôle d’excellence pour les études pré-doctorales et doctorales,  conjuguant recherche et formation d’excellence.</p>
               </div> 
              <div class="col-lg-6"><img src="images/img3.jpg" alt="mg" class="img-responsive"></div>
              <div class="col-lg-12"><p class="lead">Sous la direction du Pr. Malki Mimoun, le laboratoire s'articule autour de quatre équipes thématiques alliant recherche fondamentale, recherche appliquée et transfert technologique :</p></div>
             <div class="col-lg-8">
                 <ul class="lead">
                     <li><b class="a1">Equipe 1:</b> Information Systems Engineering and Web Data (ISEWED), dirigée par le Pr. Malki Mimoun.</li>
                     <li><b class="a2">Equipe 2:</b> Service Oriented Computing (SOC), dirigée par le Pr. Benslimane Sidi Mohamed.</li>
                     <li><b class="a3">Equipe 3:</b> Data and Software Engineering (DASE); dirigée par le Dr. Amar Bensaber Djamel.</li>
                     <li><b class="a4">Equipe 4:</b> Computational Intelligence and Soft Computing (CISCO), dirigée par le Pr. Rahmoun Abdellatif.</li>
                 
                 </ul>
              </div>  
            </div>
                
                
           </div>
        </div>
     </section>     
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
