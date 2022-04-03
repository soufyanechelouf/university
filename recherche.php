<?php  
       session_start();
       $pageTitle = "ESI Recherche";
       include "init.php";
?>
<body>
   <!-- Start recherche Page -->
        <section class="recherche">
            <div class="container">
               <div class="row">
                  <?php 
                   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                   $rech = $_POST["recherche"];
                   }
                   ?>
                  <div class="col-xs-12 heading">
                      <h2 class="h1 text-center">Recherche : <?php echo $rech; ?></h2>
                  </div>
                   <?php
                   $i = 0;
                   foreach (recherche("news", "Title", $rech) as $news) {
                    $i = $i + 1;
                   ?>
                   <div class="col-xs-12 article">
                      <div class="row">
                        <div class="col-xs-5 col-md-3">
                           <img src="<?php echo $img . $news['Image'] ?>" alt="image" class="img-responsive center-block">
                        </div>
                        <div class="col-xs-7 col-md-9">
                           <h2 class="text-center"><a href="article.php?newsid=<?php echo $news['NewsId'] ?>"><?php echo $news['Title'] ?></a></h2><br>
                           <p class="lead"><?php echo $news['Description'] ?></p> 
                           <div class="separator"></div>
                           <div class="plus">
                             <span style="color: #34495e">Ajoutée :  </span><?php echo get($news['Date']); ?><br>                            
                             <span style="color: #34495e">Catégorie :  </span><?php echo $news['Type'] ?><br>
                             <span style="color: #34495e">Par :  </span><?php echo $news['PostedBy'] ?><br>                                      
                           </div>                          
                        </div>
                      </div>
                   </div>
                     <?php } 
                     if ($i == '0'){ ?>
                     <div style="font-weight: bold;">Désolé,  auncune Resultat est trouvée!</div>
                     <?php } ?>
              </div>
            </div>
        <section>
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
