<?php  
       ob_start(); // Output Buffering Start
       session_start();
       $pageTitle = "ESI Cours";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        include "init.php";
        $level =  (isset($_GET['level']) && is_numeric($_GET['level'])) ? intval($_GET['level']) : 0;
        if (isset($_GET['type']))  $type = $_GET['type'];   
        echo $type;  
        if (isset($_GET['module']))  $module = $_GET['module'];   
        echo $module;                  
?>  
        
        <!--Start enseignantsrt space -->
    
    <section class="Cours">     
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center"><?php echo $type = 'cours' ? 'COURS' : 'TDs/TPs'; ?></h2>
              </div>
             <div class="col-md-12 content">
                <div class="col-md-2 etude text-center">
                    <h5> ESI_COURS </h5>
                    <?php if ($level == '1') {?>
                    <ul class="list-unstyled text-center list">
                      <li class="item now">Mathématique</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Analyse">Analyse</a></li>
                          <li><a href="cours.php?module=Algebre">Algebre</a></li>
                        </ul>
                      </li>
                      <li class="item">Inforamatqiue</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Algorithme">Algorithme</a></li>
                          <li><a href="cours.php?module=Architecture">Architecture</a></li>
                          <li><a href="cours.php?module=Assembluer">Assembleur</a></li>
                          <li><a href="cours.php?module=System d'Expoitation">System d'Expoitation</a></li>
                        </ul>
                      </li>
                      <li class="item">Autres</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Electronique">Electronique</a></li>
                          <li><a href="cours.php?module=Electricité">Electricité</a></li>
                          <li><a href="cours.php?module=Mecanique">Mecanique</a></li>
                          <li><a href="cours.php?module=TEO">TEO</a></li>
                          <li><a href="cours.php?module=TEE">TEE</a></li>
                          <li><a href="cours.php?module=Anglais">Anglais</a></li>
                        </ul>
                      </li>  
                    </ul>
                    <?php } ?>
                    <?php if ($level == '2'){?>
                    <ul class="list-unstyled text-center list">
                      <li class="item now"> Mathématique</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Analyse">Analyse</a></li>
                          <li><a href="cours.php?module=Algebre">Algebre</a></li>
                          <li><a href="cours.php?module=Logique Math">Logique Math</a></li>
                          <li><a href="cours.php?module=Probabilité">Probabilité</a></li>
                        </ul>
                      </li>
                      <li class="item">Informatique</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Architecture">Architecture</a></li>
                          <li><a href="cours.php?module=Electronique">Electronique</a></li>
                          <li><a href="cours.php?module=SFD">SFD</a></li>
                          <li><a href="cours.php?module=POO">POO</a></li>
                          <li><a href="cours.php?module=ISI">ISI</a></li>                         
                        </ul>
                      </li>
                      <li class="item">Autres</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?module=Optique">Optique</a></li>
                          <li><a href="cours.php?module=Angalais">Angalais</a></li>
                        </ul>
                      </li>  
                    </ul>
                    <?php } ?>                    
                 </div>
                <div class="col-md-10 contenue">
                 <div class="col-md-12 title text-center">
                   <h2><?php echo $module ?></h2>
                   <i class="fa fa-search fa-3x"></i>
                  <input type="text" name="search" placeholder="search">
                 </div>
                 <div class="col-md-12 fichiers">
                     <?php foreach (getModule('study', '$type', $level, $module, 4) as $row) { ?>
                     <div class="col-md-6">
                       <h4 class="text-primary"><?php echo $row['Name'] ?></h4><hr>
                       <i class="fa fa-file-pdf-o"></i>
                       <p class="lead"><?php echo $row['Description'] ?></p>
                       <i class="fa fa-download"></i> 
                       <span>Download</span>                        
                     </div>
                     <?php } ?>
                 </div>
                 </div>
            </div>
          </div>
        </div>
    </section>
        <!-- End enseignant space -->
<?php

       include $tpl . 'footer.php';
       ob_end_flush();
    }else{
      header("location :index.php");
    }
 ?> 