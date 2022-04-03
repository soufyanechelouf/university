<?php  
       session_start();
       $pageTitle = "ESI Conseil Scientifique";
       include "init.php";
?>
<body>    
       <section class="doc">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">Doctorat</h2>
              </div>
         <div class="col-xs-12"><p class="lead">Conformément aux dispositions de l’arrêté N° 935 du 31 Juillet 2016 portant habilitation à la formation de troisième cycle en vue de l’obtention du diplôme de doctorat et fixant le nombre de postes ouverts au titre de l’année universitaire 2016-2017 ; l’École Supérieure en Informatique de Sidi Bel Abbes annonce l’organisation d’un concours national d’accès à la formation Doctorat LMD pour l’année universitaire 2016/2017.</p></div>
          <div class="col-xs-12">
              
             <table border="1"> 
                <tr class="text-center">  
                  <td><p class="lead B"><b>Filiere</b></p></td>
                  <td><p class="lead B"><b>Intitule de Doctorat</b></p></td>
                  <td><p class="lead B"><b>Nbr de postes</b></p></td>
                  <td><p class="lead B"><b>Date du concours</b></p></td>
                  <td><p class="lead B"><b>Epreuves</b></p></td>
                  <td><p class="lead B"><b>Coef</b></p></td>
                  <td><p class="lead B"><b>Horaires des epreuves</b></p></td>
                  <td><p class="lead B"><b>Conditions d acces Master en :</b></p></td>
                  
              </tr>
                 <tr class="text-center">  
                  <td><p class="lead B">Informatique</p></td>
                  <td><p class="lead B">System d Information et Web Semantique</p></td>
                  <td><p class="lead B">08</p></td>
                  <td><p class="lead B">29/10/2016</p></td>
                  <td><p class="lead B">Bases de Donnes et Web Semantique</br></br></br>Genie Logiciel</p></td>
                  <td><p class="lead B">5</br></br></br></br>3</p></td>
                  <td><p class="lead B">08h30</br>10h30</br></br></br>11h30</br>13h00</p></td>
                  <td><p class="lead B A">-Systemes d'information Communications.</br>-Systemes  information repartis.</br>-Reseaux, Systemes et Securite de l'information.</br></br>-Web et Ingenierie de Connaissances.</br>Ingenierie des Donnees et Technologie Web.</br>-Bases de donnees et Systemes d'information Distribues.</br>-Genie logiciel.</br>-Modelisation informatique des Connaissances et Raisonnement.</br>-Systemes d'information et Donnees.</p></td>
                  
              </tr>
            </table>  
          </div>
       </section>
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
