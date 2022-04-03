<?php  
       session_start();
       $pageTitle = "ESI Enseignants";
       include "init.php";
       $teacherid =  (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;     
           $teacherid = $con->prepare("SELECT * FROM biographie WHERE BioId = $teacherid");
           $teacherid->execute(array());
           $teacher = $teacherid->fetch();

?>
<body>
    <!--Start enseignantsrt space -->
    <section class="enseignant">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 heading">
                <h2 class="h1 text-center">PROF Profile</h2>
              </div>
              <div class="col-md-12">
                      <div class="col-md-6 sub">
                            <div class="col-xs-12">
                             <a href="#" class="thumbnail">
                                  <img src="<?php echo $img . $teacher['Image'] ?>" alt="Prof">
                             </a>
                           </div>
                          <div class="col-xs-12 border">
                                 <div class="col-xs-2">
                                     <i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
                                 </div>
                                 <div class="col-xs-10">
                                    <span>Postal Address:</span>
                                    <p><?php echo $teacher['Adresse'] ?></p>
                                 </div>
                          </div>
                           <div class="col-xs-12 border">
                               <div class="col-xs-6">
                                 <div class="col-xs-3">
                                     <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
                                 </div>
                                 <div class="col-xs-9 ">
                                    <span>Phone:</span>
                                    <p class="p"><?php echo $teacher['Phone'] ?></p>
                                 </div>
                               </div>
                                <div class="col-xs-6">
                                 <div class="col-xs-3">
                                     <i class="fa fa-skype fa-3x" aria-hidden="true"></i>
                                 </div>
                                 <div class="col-xs-9">
                                    <span>Skype:</span>
                                    <p class="p"><?php echo $teacher['Web'] ?></p>
                                 </div>
                               </div>
                          </div>
                          <div class="col-xs-12 border">
                                <div class="col-xs-6">
                                 <div class="col-xs-3">
                                     <i class="fa fa-globe fa-3x" aria-hidden="true"></i>
                                 </div>
                                 <div class="col-xs-9">
                                    <span>Web:</span>
                                    <p class="p"><?php echo $teacher['Web'] ?></p>
                                 </div>
                               </div>
                                <div class="col-xs-6">
                                 <div class="col-xs-3">
                                     <i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
                                 </div>
                                 <div class="col-xs-9">
                                    <span>Email:</span>
                                    <p class="p"><?php echo $teacher['Email'] ?></p>
                                 </div>
                               </div>
                          </div>
                      </div>
                      <div class="col-md-6 parag-ens">
                          <div class="col-xs-12">
                              <h2 class="h1">A propos de  <?php echo $teacher['FirstName'] . ' ' . $teacher['LastName'];  ?></h2>
                              <p class="lead"><?php echo $teacher['AboutMe'] ?></p>
                           </div>
                           <div class="col-md-12">
                          <!-- Begin - Sliding Tabbed Panels -->
                                <div class="sp">
                                        <div class="tabs">
                                          <span class="ipad selected">COMPETENCES</span>
                                          <span class="video">BIOGRAPHY</span>
                                        </div>
                                        <div class="panel_container">
                                            <div class="panels">
                                                <div class="panels ipad">
                                                    <div class="panel_content">
                                                     <p><?php echo $teacher['Skills'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="panel video">
                                                    <div class="panel_content">
                                                       <p><?php echo $teacher['Biographie'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- End - Sliding Tabbed Panels -->
                          </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
        <!-- End enseignant space -->
</body>             
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
