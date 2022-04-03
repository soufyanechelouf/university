<?php  
       ob_start(); // Output Buffering Start
       session_start();
       $pageTitle = "ESI Profile";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        include "init.php";
        $level =  $_SESSION['level'];        
        ?>
        <!-- Start Profile -->
        <section class="user">
          <div class="container">
             <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?> Profile</h2>
              </div>
              <div class="col-xs-12 col-md-7">
                <div class="row">
                   <div class="profile col-xs-12">    
                      <div class="image">
                        <img src="images/profile.jpg" class="img-responsive thumbnail">
                      </div>
                      <div class="info">
                        <ul class="list-unstyled">
                          <li><i class="fa fa-user-circle-o "></i><label> Nom : </label> <?php echo $_SESSION['firstname'] ?></li>
                          <li><i class="fa fa-user-o"></i><label> Prénom : </label> <?php echo $_SESSION['lastname'] ?></li>
                          <li><i class="fa fa-envelope"></i><label> Email : </label> <?php echo $_SESSION['email'] ?></li>                          
                          <?php if ($_SESSION['groupid'] == '1') {?>
                          <li><i class="fa fa-signal"></i><label> Grade : </label> <?php echo $_SESSION['grade']?></li>
                          <?php }else{ ?>
                          <li><i class="fa fa-signal"></i><label> Niveau : </label> <?php echo $_SESSION['level'] . ' Année' ?></li>
                          <?php } ?>
                          <li><i class="fa fa-calendar"></i><label> Date de Registration : </label> <?php echo get($_SESSION['date']); ?></li>
                        </ul>
                        <?php if ($_SESSION['groupid'] == '1') {
                            if (total('BioUser', 'biographie', 'BioUser', $_SESSION['id']) == '0'){
                            ?>
                              <a href="bibliographie.php"><button class="btn  hvr-bounce-to-right"><i class="fa fa-plus"></i> Ajouter Ma Bibliographie</button></a>
                        <?php }else{ ?>
                          <a href="bibliographie.php?do=view"><button class="btn  hvr-bounce-to-right"><i class="fa fa-eye"></i> Afficher Ma Bibliographie</button></a>
                          <a href="bibliographie.php?do=Edit"><button class="btn  hvr-bounce-to-right"><i class="fa fa-edit"></i> Modifier</button></a>
                          <a href="bibliographie.php?do=Delete"><button class="btn  hvr-bounce-to-right"><u class="fa fa-close"></u> Supprimer</button></a>                          
                        <?php }} ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Profile -->      
        <?php 
       include $tpl . 'footer.php';
       ob_end_flush();
    }else{
      header("location :index.php");
    }
 ?> 