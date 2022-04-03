      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ournavbar" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">My ESI</a>
          </div>

          <div class="collapse navbar-collapse" id="ournavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="monespace"><a href="monespace.php"><span class="sr-only">(current)</span>A LA LUNE</a></li>
              <li class="etude"><a href="etude.php?type=Cour">COURS</a></li>
              <li class="td"><a href="td.php?type=TD">TDs/TPs</a></li>        
              <li class="exam"><a href="exam.php?type=Exam">EXAM</a></li>
              <?php if ($_SESSION['groupid'] == '2'){ ?>
              <li class="etudiant"><a href="../../site/Connexion/html/etudiant/etudiant.php">ASSIDUITE</a></li>  
              <?php  }else{?>
              <li class=""><a href="../../site/Connexion/html/etudiant/enseignant.php">ASSIDUITE</a></li>  
              <?php } ?>        
              <li class="dropdown users">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["lastname"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="profile"><a href="profile.php">Mon Profile</a></li>
                   <li role="separator" class="divider">
                   <li><a href="index.php">Acceuil</a></li>
                  <li><a href="logout.php">Déconnecter</a></li>
                 </li>
                </ul>
              </li>
            </ul>
        </div>
       </div>
      </nav>
    <!-- Start Our Slider -->
    <section>    
      <div class="testim">
          <div class="t-over-lay">
            <div class="container">
              <h2>Soyes Les Bienvenues Mr : <?php echo $_SESSION['lastname'] ?></h2>
              <?php if ($_SESSION['active'] == '0'){
               ?>
              <div class="alert alert-danger activé">Votre compte n'est pas encore activé, vérifier votre Email!</div>
              <?php } ?>
              <div class="ourSlider">
                  <div class="active">
                     <q>Centre De Notification</q>
                     <span>Direction Des Etudes</span>
                  </div>
                  <?php
                     $level   = $_SESSION['level'];                       
                      $group = $_SESSION['groupid'] == 1 ? 'teachers' : 'students';
                      foreach (getNotification('notifications', $level, $group) as $row) { ?>
                        <div>
                         <q><?php echo $row['Subject'] ?></q>
                         <?php if ($row['File']!= 'files/'){ ?> 
                           <a href="notifications.php?type=notifications&id=<?php echo $row['NotId'] ?>"><span class="down">
                             <i class='fa fa-download'></i>Telecharer
                           </span></a>
                         <?php  } ?>
                          <br>
                         <span><?php echo $row['Type'] ?></span>
                       </div>
                 <?php } ?>                   
              </div>
            </div>  
          </div>
      </div>
    </section>
    <div class="col-xs-12 vide"></div>
    <!-- End Our Slider -->  
  
