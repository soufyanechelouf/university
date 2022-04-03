<?php  
       ob_start(); // Output Buffering Start
       session_start();
       if (isset($_GET['type']))  $type = $_GET['type'];
       $pageTitle = "ESI" . "Type";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        include "init.php";
        $level =  $_SESSION['level'];  
        if (isset($_GET['year']))    $année = $_GET['year']; else $année = '';  
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
             <div class="col-xs-12 content">
                <div class="col-md-2 etude text-center">
                    <h5> ESI_<?php echo $type?></h5>
                    <?php if ($level == '1') {?>
                    <ul class="list-unstyled text-center list">
                      <?php for ($i = '2014'; $i < '2017'; $i++){ ?>
                      <li class="choice now">
                           <?php
                             $year = $i . '/' . $i = $i + '1'; 
                             echo $year;
                            ?> 
                       </li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Analyse&year=<?php echo $year ?>">Analyse</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Algebre&year=<?php echo $year ?>">Algebre</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Algorithme&year=<?php echo $year ?>">Algorithme</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Architecture&year=<?php echo $year ?>">Architecture</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Assembluer&year=<?php echo $year ?>">Assembleur</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=System d'Expoitation&year=<?php echo $year ?>">System d'Expoitation</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Electronique&year=<?php echo $year ?>">Electronique</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Electricité&year=<?php echo $year ?>">Electricité</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Mecanique&year=<?php echo $year ?>">Mecanique</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=TEO&year=<?php echo $year ?>">TEO</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=TEE&year=<?php echo $year ?>">TEE</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Anglais&year=<?php echo $year ?>">Anglais</a></li>
                        </ul>
                      </li>
                      <?php  $i = $i - '1';?>
                      <?php } ?>  
                    </ul>
                    <?php } ?>
                    <?php if ($level == '2'){?>
                    <ul class="list-unstyled text-center list">
                      <?php for ($i = '2014'; $i < '2017'; $i++){ ?>
                      <li class="choice now">
                           <?php
                             $year = $i . '/' . $i = $i + '1'; 
                             echo $year;
                            ?> 
                       </li>
                      <li class="info">
                        <ul class="list-unstyled">
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Analyse&year=<?php echo $year ?>">Analyse</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Algebre&year=<?php echo $year ?>">Algebre</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Algorithme&year=<?php echo $year ?>">Logique Math</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Probabilité&year=<?php echo $year ?>">Probabilité</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Architecture&year=<?php echo $year ?>">Architecture</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Electronique&year=<?php echo $year ?>">Electronique</a></li>                                                    
                          <li><a href="exam.php?type=<?php echo $type ?>&module=SFD&year=<?php echo $year ?>">SFD</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Orienté Object&year=<?php echo $year ?>">POO</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=ISI&year=<?php echo $year ?>">ISI</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Electricité&year=<?php echo $year ?>">Optique</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Architecture&year=<?php echo $year ?>">Architecture</a></li>
                          <li><a href="exam.php?type=<?php echo $type ?>&module=Anglais&year=<?php echo $year ?>">Anglais</a></li>
                        </ul>
                      </li>
                      <?php  $i = $i - '1';?>
                      <?php } ?>  
                    </ul>
                    <?php } ?>                    
                 </div>
                <div class="col-md-10 contenue">
                 <div class="col-md-12 title text-center">
                   <h2><?php echo $module . ' ' . $année; ?></h2>
                   <form action="search.php" method="POST">
                      <i class="fa fa-search fa-3x"></i>
                      <input type="text" name="search" placeholder="Rechercher ici">
                   </form>                 </div>
                 <div class="col-md-12 fichiers">
                     <?php 
                     $i = 0;
                     foreach (getExam('study', $level, $type, $module, $année, 8) as $row) {
                     $i = $i + 1 ;
                      ?>
                     <div class="col-md-6">
                       <h4 class="text-primary"><?php echo $row['Name'] ?></h4><hr>
                       <i class="fa fa-file-pdf-o"></i>
                       <p class="lead"><?php echo $row['Description'] ?></p>
                       <strong>Ajoutée  : </strong><span><?php echo get($row['Date']); ?></span>
                       <span><a href="donwload.php?id=<?php echo $row['StudyId'] ?>">Télecharger</a></span>
                       <i class="fa fa-download"></i>                        
                     </div>
                     <?php } 
                     if ($i == '0'){ ?>
                     <div class="alert alert-info" style="width: 113%; font-weight: bold;">Désolé,  auncun Examen est disponilbe!</div>
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