<?php  
       ob_start(); // Output Buffering Start
       session_start();
       $pageTitle = "ESI My Area";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        include "init.php";
        $level = $_SESSION['level'];
        $getArticle = $con->prepare("SELECT * FROM news WHERE Type = 'Club'");
        $getArticle->execute();
        $article = $getArticle->fetch();      
?>        

        <!-- start acc dash-->
        <section class="acc_dash">
          <div class="container">
            <div class="row">
               <div class="col-md-12 news">
                    <h2 class="text-primary">Les Actualités</h2>
                    <?php foreach (getNew('news', 1, 'General') as $row) { ?>
                    <div class="col-md-12">
                      <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><h4 class="text-primary h4"><?php echo $row['Title']; ?></h4></a>
                      <span><strong>Ajoutée  : </strong><?php echo get($row['Date']); ?></span>                      
                      <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><img src="<?php echo $img . $row['Image'] ?>" alt="image" class="img-responsive center-block"></a>
                      <p class="lead"> 
                      <?php echo $row['Description'] ?></p>
                    </div>
                    <?php } ?>
                    <hr>
                    <?php foreach (getNew('news', 3, 'Pedagogique') as $row) { ?>
                    <div class="col-md-4">
                      <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><h4 class="text-primary"><?php echo $row['Title']; ?></h4></a>
                      <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><img src="<?php echo $img . $row['Image'] ?>" alt="image" class="img-responsive center-block"></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-12 TD">
                    <h2 class="text-primary">Les Derniées Cours..</h2>
                    <?php foreach (getEtude('study', 'Cour', $level, 6) as $row) { ?>
                    <div class="col-md-6 left">                   
                        <div class="col-md-12">
                            <h2 class="text-primary"><?php echo $row['Name'] ?></h2>
                            <i class="fa fa-book fa-3x"></i>
                            <p><?php echo $row['Description'] ?></p>
                            <span><strong>Ajoutée  : </strong><?php echo get($row['Date']); ?></span>
                           <span><a href="donwload.php?id=<?php echo $row['StudyId'] ?>">Télecharger</a></span>
                           <i class="fa fa-download fa-2x"></i> 
                        </div>                          
                    </div> 
                    <?php } ?>                   
                </div>
                <div class="col-md-12 TD">
                    <h2 class="text-primary">Les Derniées TDs/TPs..</h2>
                    <?php foreach (getEtude('study', 'TD', $level, 4) as $row) { ?>
                    <div class="col-md-6 left">                   
                        <div class="col-md-12">
                            <h2 class="text-primary"><?php echo $row['Name'] ?></h2>
                            <i class="fa fa-files-o fa-3x"></i>
                            <p><?php echo $row['Description'] ?></p>
                            <span><strong>Ajoutée  : </strong><?php echo get($row['Date']); ?></span>
                           <span><a href="donwload.php?id=<?php echo $row['StudyId'] ?>">Télecharger</a></span>
                           <i class="fa fa-download fa-2x"></i> 
                        </div>                          
                    </div> 
                    <?php } ?>                   
                </div>
                <div class="col-md-12 TD">
                    <h2 class="text-primary">Les Examens..</h2>
                    <?php foreach (getEtude('study', 'Exam', $level, 4) as $row) { ?>
                    <div class="col-md-6 left">                   
                        <div class="col-md-12">
                            <h2 class="text-primary"><?php echo $row['Name'] ?></h2>
                            <i class="fa fa-files-o fa-3x"></i>
                            <p><?php echo $row['Description'] ?></p>
                            <span><strong>Ajoutée  : </strong><?php echo get($row['Date']); ?></span>
                           <span><a href="donwload.php?id=<?php echo $row['StudyId'] ?>">Télecharger</a></span>
                           <i class="fa fa-download fa-2x"></i> 
                        </div>                          
                    </div> 
                    <?php } ?>                   
                </div>
                <div class="col-md-12 last-act">
                    <h2 class="h1">Les Statistics</h2>
                        <!-- Start Statistics -->
                        <section class="stat text-center">
                          <div class="data">
                            <div class="container">
                              <div class="row">
                                 <div class="col-lg-4 col-sm-6">
                                    <div class="num">
                                      <i class="fa fa-book fa-5x"></i>
                                      <p class="count"><?php echo totalLevel('StudyId', 'study', 'Type', 'Cour', 'Level', $level) ?></p>
                                      <span>Nombre De Cours</span>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-sm-6">
                                    <div class="num">
                                      <i class="fa fa-file-text  fa-5x"></i>
                                      <p class="count"><?php echo totalLevel('StudyId', 'study', 'Type', 'TD', 'Level', $level) ?></p>
                                      <span>Nombre De TDs/TPs</span>
                                    </div>
                                 </div>
                                 <div class="col-lg-4 col-sm-6">
                                    <div class="num">
                                      <i class="fa fa-file fa-5x"></i>
                                      <p class="count"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', $level) ?></p>
                                      <span>Nombre d'Examens</span>
                                    </div>
                                 </div> 
                             </div>
                            </div>
                          </div>
                        </section>
                        <!-- End Stat -->
                </div>
            </div>
          </div>
        </section>
        <!-- start acc dash-->
<?php

       include $tpl . 'footer.php';
       ob_end_flush();
    }else{
      header("location :index.php");
    }
 ?>          