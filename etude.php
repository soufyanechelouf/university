<?php  
       ob_start(); // Output Buffering Start
       session_start();
       $pageTitle = "ESI Cours";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        if (isset($_GET['type']))  $type = $_GET['type']; 
        include "init.php";
        $level =  $_SESSION['level'];  
        if (isset($_GET['module']))  $module = $_GET['module'];
        else {
            switch ($level) {
                case '1':
                    $module = 'Analyse';
                break;
                case '2':
                    $module = 'Analyse';
                break;
                case '3':
                    $module = 'Analyse';
                break;
                case '4':
                    $module = 'Analyse';
                break;
                case '5':
                    $module = 'Analyse';
                break;                                       
               }  
        }              
?>  
        
    <!--Start enseignantsrt space -->  
    <section class="Cours">     
          <div class="container">
            <div class="row">
              <div class="col-xs-12 vide">
              </div>
             <div class="col-xs-12 content">
                <div class="col-md-2 etude text-center">
                    <h5> ESI_<?php echo $type == 'Cour' ? 'COURS' : 'TDs/TPs'; ?></h5>
                    <?php if ($level == '1') {?>
                    <ul class="list-unstyled text-center list">
                      <li class="choice now">Mathématique</li>
                      <li class="info" style="display: block">
                        <ul class="list-unstyled">
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Analyse">Analyse</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Algebre">Algebre</a></li>
                        </ul>
                      </li>
                      <li class="choice">Inforamatqiue</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Algorithme">Algorithme</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Architecture">Architecture</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Assembluer">Assembleur</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=System d'Expoitation">System d'Expoitation</a></li>
                        </ul>
                      </li>
                      <li class="choice">Autres</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Electronique">Electronique</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Electricité">Electricité</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Mecanique">Mecanique</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=TEO">TEO</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=TEE">TEE</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Anglais">Anglais</a></li>
                        </ul>
                      </li>  
                    </ul>
                    <?php } ?>
                    <?php if ($level == '2'){?>
                    <ul class="list-unstyled text-center list">
                      <li class="choice now"> Mathématique</li>
                      <li class="info" style="display: block;">
                        <ul class="list-unstyled">
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Analyse">Analyse</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Algebre">Algebre</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Logique Math">Logique Math</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Probabilité">Probabilité</a></li>
                        </ul>
                      </li>
                      <li class="choice">Informatique</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="cours.php?etude.php?type=<?php echo $type ?>&module=Architecture">Architecture</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Electronique">Electronique</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=SFD">SFD</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>}&module=Orienté Object">POO</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=ISI">ISI</a></li>                         
                        </ul>
                      </li>
                      <li class="choice">Autres</li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Optique">Optique</a></li>
                          <li><a href="etude.php?type=<?php echo $type ?>&module=Angalais">Angalais</a></li>
                        </ul>
                      </li>  
                    </ul>
                    <?php } ?>                    
                 </div>
                <div class="col-md-10 contenue">
                 <div class="col-md-12 title text-center">
                   <h2><?php
                    echo $module ?></h2>
                   <form action="search.php" method="POST">
                      <i class="fa fa-search fa-3x"></i>
                      <input type="text" name="search" placeholder="Rechercher ici">
                   </form>
                 </div>
                 <div class="col-md-12 fichiers">
                     <?php 
                     $i = 0;
                     foreach (getModule('study', $level, $type, $module, 20) as $row) { 
                      $i = $i + 1 ;
                      ?>
                     <div class="col-md-6">
                       <h4 class="text-primary"><?php echo $row['Name'] ?></h4><hr>
                       <i class="fa fa-file-pdf-o"></i>
                       <p class="lead"><?php echo $row['Description'] ?></p>
                       <strong>Ajoutée  : </strong><span><?php echo get($row['Date']); ?></span>
                       <span><a href="donwload.php?id=<?php echo $row['StudyId'] ?>">Télecharger</a></span>
                       <i class="fa fa-download"></i> </a>                    
                     </div>
                     <?php } 
                     if ($i == '0'){ ?>
                     <div class="alert alert-info" style="width: 113%; font-weight: bold;">Désolé,  auncun Cour est disponilbe!</div>
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