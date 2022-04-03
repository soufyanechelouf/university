<?php  
       session_start();
       $pageTitle = "ESI Success";
       include ("init.php");
       
?>
<body>
    <section class="signing">
          <div class="container">
                        <div class="row">
                                  <div class="col-xs-12 heading">
                                    <h2 class="h1 text-center"> Success </h2>
                                  </div>
                                        <div class="form">
                                            <h1><?= 'Success'; ?></h1>
                                            <p>
                                            <?php 
                                            if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                                                echo $_SESSION['message'];    
                                            else:
                                                header( "location: registration.php" );
                                            endif;
                                            ?>
                                            </p>
                                            <a href="registration.php"><button class="button button-block"/>Home</button></a>
                                        </div>
                            </div>
                  </div>
    </section>   
</body>
</html>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
