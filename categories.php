<?php  
       session_start();
       $pageTitle = "Show Categorie";
       include "init.php";
 
       if (isset($_SESSION['user'])){ ?>
<div class="container">
   <h1 class="text-center">Show Categorie</h1>

         <!-- Start events -->
        <section class="events">
          <div class="container">
            <hr>  
            <div class="row info">

                <?php
                     foreach (getItem('CatId',$_GET['pageid'], 'Name', 4) as $item) {
                       echo '<div class="col-md-4 col-xs-12">';
                          echo   '<div class="image text-center">';
                               echo   '<div class="image-over"><i class="fa fa-plus-square-o fa-3x"></i></div>';
                               echo   '<img src="images/testim.jpg" alt="" class="img-responsive center-block">';
                          echo '</div>';
                          echo '<div class="article">';
                                 echo  '<h2 class="text-center"><a href="item.php?itemid='. $item['ItemId'] .'">'. $item['Name'] .'</a></h2>';
                                 echo  '<p class="lead">'. $item['Description'] .'</p>';                                 
                                 echo  '<hr>';
                                 echo  '<span>Posted in :'. $item['Name']. '</span><br>';
                                 echo  '<span>Tags:'. $item['Name'] . 'In:</span>';
                                 echo  '<q>'. $item['AddDate'] .'</q>';                                 
                          echo  '</div>';
                         echo  '</div>';
                   }

                 ?>
            </div>
          </div>
        </section>
        <!-- End Events  -->
</div>
       <?php
        }else {
            echo "<div class='alert alert-danger'>You cant't Browse this page directly</div>";

       }
       include $tpl . 'footer.php';
       ob_end_flush();
?>
