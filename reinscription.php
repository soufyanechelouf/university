<?php  
       session_start();
       $pageTitle = "ESI Reinscription";
       include "init.php";
?>
<body>
        <!-- Start reinscription -->
         <section class="Reinscription">       
           <div class="container">
            <div class="row">
             <div class="col-xs-12 heading"><h2 class="h1 text-center">Réinscription en Doctorat</h2> </div>
              <div class="col-lg-12"><p class="lead">La procédure de réinscription n’est pas automatique. Le doctorant est tenu de renouveler son inscription chaque année universitaire, faute de quoi, il sera considéré en situation d’abandon et sera définitivement rayé de la liste des doctorants.
             La réinscription est subordonnée à une présentation par le doctorant de son état d’avancement visé par son directeur de Thèse.
             Le nombre maximal d’inscriptions est fixé à 5. Exceptionnellement, et sur avis dérogatoire du conseil scientifique une 6ième inscription pourra être accordée au doctorant (décret n°60 du 19 août 1998).</p></div>
            <div class="col-lg-12"><p class="lead">Le dossier de réinscription doit être déposé au secrétariat de la DPGR entre le <b> 1er et le 30 octobre.</b> Il comprend :</p> </div> 
            <div class="col-lg-12">
              <ul class="lead">
                <li>L’autorisation de réinscription visée par le directeur de thèse.</li>
                <li>Un état d’avancement des travaux de recherche du doctorant (6 pages).</li>
                <li>Une copie de chaque production scientifique.</li>
                <li>Une quittance de 200 DA (Frais d'inscription).</li>
                <li>Une copie de l'attestation d'inscription de l'année précédente.</li>
             </ul>
             </div> 
              <p class="lead">Tout dossier incomplet, mal présenté ou déposé en dehors de cette période est rejeté.</p> 
            </div>
           </div> 
       </section> 
       <!-- End reinscription -->    
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
