<?php  
       session_start();
       $pageTitle = "ESI Conseil Scientifique";
       include "init.php";
?>
<!DOCTYPE html>
<body>
        <!-- Start Presentation -->
        <section class="presentation">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">Mot De Directeur</h2>
              </div>
              <div class="col-md-2">
                <img src="images/benslimane3030.png" alt="benslimane3030" class="img-responsive">
              </div>
              <div class="col-md-10">
                <p class="lead">
                 Chers collaborateurs, chers étudiants
                 <br><br>
                 En ce début d'année universitaire, je tiens à m'adresser à vous tous pour vous souhaiter une année pleine de labeur et de satisfaction d'une part, et vous faire partager mes convictions de rendre notre École un site privilégié de formation de qualité d'autre part.<br><br><br>
                </p>
              </div>
              <div class="col-md-12">
                <p class="lead">
                 L'École, dans ses ambitions, devrait se hisser au pôle d'excellence qui est inhérent au développement de la recherche et la promotion de son staff et bien sûr à l'émancipation de ses infrastructures. L'école Bénéficiera d'un environnement scientifique et technologique de très haut niveau. Elle compte offrir une formation au contact de la recherche et de l'innovation. Attentifs aux avancées technologiques et aux attentes des entreprises, l'offre de formation sera évolutive et s'adaptera aux exigences industrielles.
                 <br><br>
                  À mes étudiants, je dis «Bienvenue à l'école ». Être dans une École supérieur ou à l'Université est une nouvelle aventure. Cette étape totalement différente de votre formation du lycée, vous oblige à adopter un comportement beaucoup plus responsable et autonome. Cette transition du lycée vers l'École supérieur vous permet de vous projeter sur un avenir de grandes ambitions et de hardiesse à l'image des étudiants des pays avancés. Vous en êtes capables et je me tiens à votre entière disposition pour surmonter toutes les difficultés que vous pourrez rencontrer.
                  <br><br>
                  Enfin, j'affirme ma volonté de collaborer en parfaite synergie avec toutes les composantes de l'École et j'espère que la conjugaison de nos efforts portera ses fruits au niveau de nos étudiants à qui je souhaite encore une fois une année pleine de succès.
                </p>
              </div>
              <div class="col-md-offset-8">
                  <p style="font-weight: bold;">
                    PR. SIDI MOHAMED BENSLIMANE<br>
                    DIRECTEUR DE L'ÉCOLE
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
   
