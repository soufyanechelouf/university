<?php  
ob_start();
       session_start();
       $pageTitle = "Error";
       include "init.php" ;
        
?>
    <!-- end navbar  -->
<section class="signing">
          <div class="container">
                        <div class="row">
                                  <div class="col-xs-12 heading">
                                    <h2 class="h1 text-center"> Oops! Vous avez trompé !</h2>
                                  </div>
                            <div class="form">
                                    <h1>Erreur</h1>
                                    <p class="lead ">
                                    <?php 
                                    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
                                        echo $_SESSION['message'];    
                                    else:
                                        header( "location: registration.php" );
                                    endif;
                                    ?>
                                    </p>     
                                    <a href="../ESI_SBA/registration.php"><button class="button button-block"/>Retour</button></a>
                           </div>
                     </div>      
    </div>
    </section>
   
    
</body>
<?php
       include $tpl . 'footer.php' or die.mysqli_error;
       ob_end_flush();
 ?>  