<?php  
       session_start();
       $pageTitle = "ESI Article Details";
       include "init.php";

       $newsid =  (isset($_GET['newsid']) && is_numeric($_GET['newsid'])) ? intval($_GET['newsid']) : 0;     
           $getArticle = $con->prepare("SELECT * FROM news WHERE NewsId = ?");
                 $getArticle->execute(array($newsid));
                 $article = $getArticle->fetch();
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

              <div class="col-lg-8 article">
                <h2 class="h1"><?php echo $article['Title'] ?></h2>
                <hr>
                <ul class="list-unstyled">
                  <li><i class='fa fa-edit'></i><?php echo get($article['Date']); ?></li>
                  <li><i class='fa fa-user'></i>Ajouter Par : <?php echo $article['PostedBy'] ?></li>
                  <li><i class='fa fa-laptop'></i>Categorie: <?php echo $article['Type'] ?></li>                                                      
                </ul>      
                <img src="<?php echo $img . $article['Image'] ?>" alt="image" class="img-responsive center-block">
                <p class="description lead"><?php echo $article['Description'] ?></p>
                <hr>
                <p class="lead"><?php echo $article['Details'] ?></p>
              </div>
              <aside class="col-lg-4 sidebar-area hidden-xs hidden-sm">
                <div class="post">
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
                    <button class="btn  hvr-bounce-to-right" type="submit" name="search" style="margin-top: -35px; margin-right: 12px; float: right;"><i class="fa fa-search"></i> </button>
                   </form>
                  </div>                  
              </aside>
            </div>
          </div>
        </section>
        <!-- End Article Page  -->
    
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
