<?php  
       session_start();
       $pageTitle = "ESI Events Details";
       include "init.php";

       $id =  (isset($_GET['eventid']) && is_numeric($_GET['eventid'])) ? intval($_GET['eventid']) : 0;     
           $getEvent = $con->prepare("SELECT * FROM events WHERE EventId = ?");
                 $getEvent->execute(array($id));
                 $event = $getEvent->fetch();
        $nbrarticle = 3; // Number of latest Users
        $latestarticle = getLatest("*", "news", 'Date', $nbrarticle); // Latest Student Array                  
?>
<body>
        <!-- Start Article Page  -->
        <section class="presentation">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">PLUS DE DETAILS..</h2>
              </div>

              <div class="col-lg-8 event">
                <h2 class="h1"><?php echo $event['Title'] ?></h2>    
                <img src="<?php echo $img . $event['Image'] ?>" alt="image" class="img-responsive center-block">
                <p class="description lead" style="margin-top: 20px;"><?php echo $event['Description'] ?></p>
                <hr>
                <div class="row info">
                  <div class="col-xs-9">
                    <ul class="list-unstyled">
                      <li><i class='fa fa-clock-o'></i><span>Début : </span><span class="text"><?php echo $event['Date'] ?><span></span></li>
                      <li><span>Fin : </span><span class="text"><?php echo $event['EndDate'] ?><span></li><br>
                      <li><i class='fa fa-map-marker '></i><span>Adresse : </span><span class="text"><?php echo $event['Adresse'] ?><span></li>      
                   </ul>                
                  </div>
                  <div class="col-lg-3">
                   <a href="<?php echo $event['Facebook'] ?>"><button class="btn  hvr-bounce-to-right">Intéressé</button></a>
                  </div>                                                                       
                </div>
              </div>
              <aside class="col-lg-4 sidebar-area hidden-xs hidden-sm">
                <div class="post" >
                  <hr>
                  <h3>RECENT POSTS</h3>
                  <?php 
                      if (!empty($latestarticle)){
                      foreach ($latestarticle as $article ) { ?>
                   <div class="row">
                     <div class="col-lg-4">
                       <img src="<?php echo $img . $article['Image'] ?>" alt="image" class="img-responsive center-block">
                     </div>
                     <div class="col-lg-8">
                       <h4><a href="article.php?newsid=<?php echo $article['NewsId'] ?>"><?php echo $article['Description'] ?></a></h4>
                       <span>Categorie : <a href="morearticle.php?type=<?php echo $article['Type'] ?>"><?php echo $article['Type'] ?></a></span>
                     </div>
                   </div>
                 <?php } }?>                   
                </div>
                <hr>
                  <h3>ARCHIVE</h3>
                  <div>
                   <form class="form-horizontal form-center" action="archive.php" method="POST">
                      <select name="archive">
                        <option value="3 MONTH">Les derniers 3 mois</option>                    
                        <option value="6 MONTH">Les derniers 6 mois</option>   
                        <option value="9 MONTH">Les derniers 9 mois</option>
                        <option value="3 YEAR">Les derniers Années</option>                                                                     
                     </select>
                    <!-- Start Submit Filed -->
                    <button class="btn  hvr-bounce-to-right" type="submit" name="search" style="margin-top: -35px;margin-right: 12px; float: right;"><i class="fa fa-search"></i> </button>
                   </form>
                  </div>                  
              </aside>
            </div>
          </div>
        </section>
        <!-- End Article Page  -->
   </body>
</html>      
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
