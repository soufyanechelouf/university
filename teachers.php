<?php  
       session_start();
       $pageTitle = "ESI Profs";
       include "init.php";
?>
<body>
     <!--Start enseignantsrt space -->
    <section class="les_profs">
        <div class="titre container">    
                  <h2 class="h1 text-center">Nos Enseignants</h2>
            </div>
      <div class="container">    
        <div class="row">
         <?php foreach (getAll('biographie', 'LastName') as $teacher) { ?>
          <div class="col-sm-12 col-md-3 prof">
               <a href="teacher.php?id=<?php echo $teacher['BioId'] ?>"><img src="<?php echo $img . $teacher['Image'] ?>" alt="image" class="img-responsive center-block"></a>
               <div class="caption">
                <h3><?php echo $teacher['FirstName'] . ' ' . $teacher['LastName'];  ?></h3>
                <p><?php echo $teacher['AboutMe'] ?><a href="teacher.php?id=<?php echo $teacher['BioId'] ?>">..Plus</a></p>
              </div>
          </div>
          <?php } ?>
       </div>
     </div>
    </section>
    <!-- End enseignant space -->
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
