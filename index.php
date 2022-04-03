<?php  
       session_start();
       $pageTitle = "ESI Ecole Supérieur En Informatique";
       include "init.php";

?>

   <body>
      <!-- Start Header -->
        <section class="slider hidden-xs hidden-sm">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to=""></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="images/esi-cover2.jpg" alt="...">
                      <div class="carousel-caption wow fadeInUp">
                        <h2 class="h1">ESI Sidi Bel Abbes</h2>
                        <p class="lead">Le Site Officiel D'Ecole Superieure en Informatique</p>
                        <a href="presentation.php">
                            <button class="btn btn-primary">
                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                             Plus..
                            </button>
                        </a>
                        <?php  if (!isset($_SESSION['email'])){ ?>
                        <a href="registration.php">
                            <button class="btn btn-primary">
                              <i class="fa fa-sign-in" aria-hidden="true"></i>
                              Connecter
                            </button>
                        </a>
                        <?php } ?>
                      </div>
                    </div>
                     <?php foreach (getSlider('news', 3) as $news) { ?>
                    <div class="item">
                       <img src="<?php echo $img . $news['Image'] ?>" alt="image" class="img-responsive center-block">
                      <div class="carousel-caption">
                        <h2 class="h1"><?php echo $news['Title'] ?></h2>
                        <p class="lead"><?php echo $news['Description'] ?></p>
                        <a href="article.php?newsid=<?php echo $news['NewsId'] ?>">
                            <button class="btn btn-primary">
                             <i class="fa fa-info-circle" aria-hidden="true"></i>
                             Plus..
                            </button>
                        </a>
                        <?php  if (!isset($_SESSION['email'])){ ?>
                        <a href="registration.php">
                            <button class="btn btn-primary">
                              <i class="fa fa-sign-in" aria-hidden="true"></i>
                              Connecter
                            </button>
                        </a>
                        <?php } ?>
                      </div>
                    </div>
                    <?php } ?>                 
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
        </section>
        <!-- End Header -->  

        <!-- Start About Us -->
        <section class="about_us">
          <div class="container">
            <div class="row text-center">
              <div class="col-md-4 col-xs-12">
                  <div class="over-lay">
                    <h2><i class="fa fa-graduation-cap"></i>Notre Ecole</h2>
                    <p>Nombreux laboratoires pédagogiques et de recherche.</br>
                    Cursus et programmes de formation modernes et évolutifs.</br>
                     Bibliothèque centrale et espace multimédia.</br>
                     Partenariat avec le Secteur...</p>
                     <a href="presentation.php"><button>Read More</button></a>
                  </div>
              </div>
              <div class="col-md-4 col-xs-12">
                   <div class="over-lay">
                    <h2><i class="fa fa-pencil-square-o"></i>AlphaBit Club</h2>
                    <p class="lead">AlphaBit est un club scientifique dans l'ESI, il éte crée officiellement au debut de cette année , le role etendu de ce club est de faire un envirenment de travail ensemble dans cette école , et pour améliorer le niveau des etudiants ...</p>
                    <a href="alphabit/alpha.html"><button>Entrer</button></a>
                  </div>
              </div>              
              <div class="col-md-4 col-xs-12 text-center">
                   <div class="over-lay">
                    <h2><i class="fa fa-pencil-square-o"></i>Mot De Directeur</h2>
                    <p class="lead">Chers collaborateurs, chers étudiants
                     En ce début d'année universitaire, je tiens à m'adresser à vous tous pour vous souhaiter une année pleine de labeur et de satisfaction d'une part, et vous faire partager mes convictions ...</p>
                    <a href="mdedirecteur.php"><button>Read More</button></a>
                  </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End About Us -->
        
        <!-- Start Actu -->
        <section class="events">
          <div class="container">
            <h2 class=" title text-center">Les Actualités</h2>
            <hr>  
            <div class="row info">
              <?php foreach (getNews('news', 3) as $news) { ?>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 recent">
                 <div class="image text-center">
                   <div class="image-over">
                      <a href="article.php?newsid=<?php echo $news['NewsId'] ?>"><i class="fa fa-plus-square-o fa-3x"></i></a>
                   </div>
                   <img src="<?php echo $img . $news['Image'] ?>" alt="image" class="img-responsive center-block">
                 </div>                     
                 <div class="article">     
                   <div class="row">
                     <div class="col-xs-2">
                       <div class="date">
                         <span class="day"><?php echo  date('d', strtotime($news['Date']))  ?></span>
                         <span class="month"><?php
                          $month = date('m', strtotime($news['Date']));
                            switch ($month) {
                               case '1':
                                 echo "Janvier";
                                 break;
                               case '2':
                                 echo "Fevrier";                             
                                 break;
                               case '3':
                                 echo "Mars";                                 
                                 break;
                               case '4':
                                 echo "Avril";
                                 break;
                               case '5':
                                 echo "Mai";                               
                               break;
                               case '6':
                                 echo "Juin";                                 
                                 break;
                               case '7':
                                 echo "Juillet";
                                 break;
                               case '8':
                                 echo "Aôut";                               
                               break;
                               case '9':
                                 echo "Septembre";                                 
                                 break;
                               case '10':
                                 echo "Octobre";
                                 break;
                               case '11':
                                 echo "Novembre";                               
                               break;
                               case '12':
                                 echo "Decembre";                                 
                                 break;                                                                                                   
                             } 
                          ?></span>
                       </div>
                     </div>
                     <div class="col-xs-10">
                         <h2 class="text-center"><a href="article.php?newsid=<?php echo $news['NewsId'] ?>"><?php echo $news['Title'] ?></a></h2> 
                         <p class="lead"><?php echo $news['Description'] ?></p> 
                         <div class="separator"></div>
                         <div class="plus">
                           <span style="color: #34495e">Catégorie : </span><?php echo $news['Type'] ?><br>
                           <span style="color: #34495e">Par :  </span><?php echo $news['PostedBy'] ?>                           
                         </div>
                     </div>
                   </div>
                 </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </section>
        <!-- End Actu -->
       

        <!-- start etude -->
        <section class="etude">
          <div class="container">
            <h2 class="title  text-center"> Espace Pédagogique</h2>
            <hr>
            <div class="row" data-wow-duration="1.2s" data-wow-delay=".3s">
              <?php foreach (getNew('news', 3, 'Pedagogique') as $row) { ?>
               <div class="col-sm-12">
                   <div class="col-sm-3">
                       <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><img src="<?php echo $img . $row['Image'] ?>" alt="image" class="img-responsive center-block" style="height: 153px; width: 258px;"></a>
                   </div>
                   <div class="col-sm-8 article">
                     <a href="article.php?newsid=<?php echo $row['NewsId'] ?>"><h3><?php echo $row['Title'] ?></h3></a>
                     <p class="lead"><?php echo $row['Description'] ?><a href="article.php?newsid=<?php echo $row['NewsId'] ?>" style='text-decoration: none'>  Plus..</a></p>
                     <div class="plus">
                        <span style="color: #34495e">Catégorie : </span><?php echo $row['Type'] ?><br>
                        <span style="color: #34495e">Par :  </span><?php echo $row['PostedBy'] ?>                           
                     </div>                     
                   </div>
               </div>
               <?php } ?>  
          </div>
        </section>
        <div class="vide"></div>
        <!-- End etude -->

        <!-- Start Section Our Team -->
        <section class="ourteam text-center">
           <div class="team">
              <div class="container">
                 <h2 class="title text-center">Annuaire</h2>
                 <div class="row">
                    <?php foreach (getBio('biographie', 4) as $teacher) { ?>
                    <div class="col-lg-3 col-xs-12 col-md-6">
                       <div class="person">
                          <a href="teacher.php?id=<?php echo $teacher['BioId'] ?>"><img src="<?php echo $img . $teacher['Image'] ?>" alt="image" class="img-responsive center-block"></a>
                         <div class="follow hidden-sm hidden-xs">
                           <ul>
                             <a href="<?php echo $teacher['Facebook']?>" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                             <a href="<?php echo $teacher['Twitter']?>" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                             <a href="<?php echo $teacher['Youtube']?>" target="_blank"><i class="fa fa-youtube fa-lg"></i></a>
                             <a href="<?php echo $teacher['Email']?>" target="_blank"><i class="fa fa-google fa-lg"></i></a>
                           </ul>
                         </div>
                         <h3><?php echo $teacher['FirstName'] . ' ' . $teacher['LastName']; ?></h3>
                         <p><strong><?php echo $teacher['FirstName'] . ' ' . $teacher['LastName'];  ?></strong><?php echo ' ' . $teacher['AboutMe'] ?></p>
                       </div>
                      </div>
                    <?php } ?>
                 </div>
               <h3><a href="teachers.php">Plus</a></h3>
             </div>
           </div>
        </section>
        <!-- End Our Team -->        

        <!-- Start Evenments -->
        <section class="evenments text-center">
            <div class="container">
              <h2 class="text-center title">Les Evènements</h2>
              <hr>
            <!-- Start  Carousel -->
            <div id="carouselTestim" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
               <?php foreach (getNews('events', 1) as $event) { ?>                     
                <div class="item active">
                    <h3 class="lead"><?php echo $event['Title'] ?></h3>
                    <p class="lead"><?php echo $event['Description'] ?></p>
                    <a href="events.php?eventid=<?php echo $event['EventId'] ?>"><button class=" btn-lg hvr-bounce-to-right"><i class="fa fa-plus fa-lg"></i> Plus</button> </a>                 
                </div>
                <?php } ?>  
               <?php foreach (getNews('events', 3) as $event) { ?>                     
                <div class="item">
                    <h3 class="lead"><?php echo $event['Title'] ?></h3>
                    <p class="lead"><?php echo $event['Description'] ?></p><br>
                    <a href="events.php?eventid=<?php echo $event['EventId'] ?>"><button class=" btn-lg hvr-bounce-to-right"><i class="fa fa-plus fa-lg"></i> Plus</button> </a>               
                </div>
                <?php } ?>
                <ol class="carousel-indicators">
                <li data-target="#carouselTestim" data-slide-to="0" class="">
                </li>
                <li data-target="#carouselTestim" data-slide-to="1">
                </li>
                <li data-target="#carouselTestim" data-slide-to="2">
                </li>
              </ol>
              </div>
            </div>
            <!-- End  Carousel -->
            </div>
        </section>
        <!-- End Evenments -->


        <!-- Start Alphabit -->
            <section class="alpha text-center">
                  <div class="container">
                     <h2 class="text-center title">Alpha Bit Club</h2>
                     <hr>
                      <ul class="timeline">
                          <li>
                            <div class="timeline-badge"><i class="fa fa-cc-diners-club"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title">Education</h4>
                              </div>
                              <div class="timeline-body">
                                <p>In 1934, Grace was awarded a PhD in mathematics from Yale University, following her Master's from Yale and Bachelor's from Vassar. She then returned to Vassar to teach mathematics.</p>
                              </div>
                            </div>
                          </li>

                          <li class="timeline-inverted">
                            <div class="timeline-badge"><i class="fa fa-cc-diners-club"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title">World War II</h4>
                              </div>
                              <div class="timeline-body">
                                <p>After enlisting in the Navy Reserve and completing her training at Smith College, Grace served as one of three principal programmers of the Mark I computer at Harvard.</p>                
                              </div>
                            </div>
                          </li>

                          <li>
                            <div class="timeline-badge"><i class="fa fa-cc-diners-club"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title">Eckert–Mauchly Computer Corporation</h4>
                              </div>
                              <div class="timeline-body">
                                <p>Grace was hired as a senior mathemtician on the team devloping UNIVAC, the first commercial computer produced in the United States.</p>
                              </div>
                            </div>
                          </li>

                          <li class="timeline-inverted">
                            <div class="timeline-badge"><i class="fa fa-cc-diners-club"></i></div>
                            <div class="timeline-panel">
                              <div class="timeline-heading">
                                <h4 class="timeline-title">Remington Rand</h4>
                              </div>
                              <div class="timeline-body">
                                <p>Grace developed the A-0 system, an arithmetic language and what is regarded to be the first compiler. This paved the way for new high-level language development.</p>
                                <hr>
                              </div>
                            </div>
                          </li>
                      </ul> <!-- end  -->
                  </div>
              </section>
              <!-- End Alphabit -->
         <!-- Start Statistics -->
        <section class="stat text-center">
          <div class="data">
            <div class="container">
              <h2 class="text-center title">Les Statistics</h2>
              <div class="row">
                 <div class="col-lg-3 col-sm-6">
                    <div class="num">
                      <i class="fa fa-users fa-5x"></i>
                      <p class="count"><?php echo total('UserId', 'users', 'GroupId', 2) ?></p>
                      <span>Nombre Etudiants</span>
                    </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                    <div class="num">
                      <i class="fa fa-comments fa-5x"></i>
                      <p class="count"><?php echo total('UserId', 'users', 'GroupId', 1) ?></p>
                      <span>Nombre Profs</span>
                    </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                    <div class="num">
                      <i class="fa fa-suitcase fa-5x"></i>
                      <p class="count">0</p>
                      <span>Nombre Visiteurs</span>
                    </div>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                    <div class="num">
                      <i class="fa fa-support fa-5x"></i>
                      <p class="count"><?php echo total('StudyId', 'study', 'Type', 'Cour') ?></p>
                      <span>Nombre Cours</span>
                    </div>
                 </div> 
             </div>
            </div>
          </div>
        </section>
        <!-- End Stat -->              

  </body>
<?php

       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
