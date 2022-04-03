<?php  
       session_start();
       $pageTitle = "ESI Article Plus";
       include "init.php";

        $nbrarticle = 3; // Number of latest Users
        $latestarticle = getLatest("*", "news", 'Date', $nbrarticle); // Latest Student Array 
       if (isset($_GET["type"])){
        $type = $_GET["type"];
       }   
              
?>
<body>
        <!-- Start Cat Article Page  -->
        <section class="presentation">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center"><?php echo   ' ARTICLES' .  ' '. $type; ?></h2>
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
                </aside>             
              <?php foreach (getLatestNews('*', 'news', $type, 'Date', 10 ) as $article) { ?>
              <div class="col-lg-8 article">
               <div class='row'>
                  <div class="col-xs-1">
                       <div class="date">
                         <span class="day"><?php echo  date('d', strtotime($article['Date']))  ?></span>
                         <span class="month"><?php  echo getMontName($article['Date']); ?></span>
                       </div>
                   </div>              
                  <div class="col-xs-11">
                     <a href="article.php?newsid=<?php echo $article['NewsId'] ?>" style='text-decoration: none; color:black'><h2 class="h1"><?php echo $article['Title'] ?></h2></a>
                  </div> 
                  <hr>  
                  <div class="col-xs-10 ">
                    <img src="<?php echo $img . $article['Image'] ?>" alt="image" class="img-responsive center-block" style='margin-left: 20px'>
                    <p class="description lead"><?php echo $article['Description'] ?></p>
                    <ul class="list-unstyled">
                      <li><i class='fa fa-user'></i>Ajouter Par : <?php echo $article['PostedBy'] ?></li>
                      <li><i class='fa fa-laptop'></i>Categorie : <?php echo $article['Type'] ?></li>                                                      
                    </ul>
                    <a href="article.php?newsid=<?php echo $article['NewsId'] ?>"><button class="btn  hvr-bounce-to-right" style="color:#666"><i class='fa fa-plus'></i> Plus</button></a>
                    </div>
                </div>
                 <div class="clearfix"></div> 
                <hr>
                </div>
               <?php } ?>
            </div>
          </div>
        </section>
        <!-- End Cat Article Page  -->     
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   





