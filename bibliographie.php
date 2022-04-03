<?php

      /*=======================================================
      ==== Manage Biography Page
      ==== You Can Add \ Edit | Delete Biography from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Ma Biliographie";
    if (isset($_SESSION["email"])){
        $Navbar2 = " ";
        include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Add";
        $biouser =  $_SESSION['id'];


        if ($do == "view"){  // Manage Biographie Page 
            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT BioId FROM biographie WHERE BioUser=? LIMIT 1");            

            // Execute query
            $stmt->execute(array($biouser));

            // Fetch the data
            $row = $stmt->Fetch(); 
            $link = '?id=' . $row['BioId'];
            // Redirection to View Page
            header("location: teacher.php" . $link);
       }elseif ($do == "Add"){ //Add Biography ?>
       <section class="maBio">
          <div class="container">
                 <div class="row">
                     <div class="col-xs-12 heading">
                        <h2 class="h1 text-center">Ajouter ma Biobliographie</h2>
                    </div>
                 </div>
                 <form class="form-horizontal form-center" action="?do=Insert" method="POST" enctype="multipart/form-data">
                        <!-- Start About Me Filed -->
                        <input type="hidden" name="biouser" value="<?php echo $biouser; ?>">
                        <input type="hidden" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                        <input type="hidden" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                        <!-- Start AboutMe Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">About Me</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="aboutme" class="form-control"  rows="8" cols="50"></textarea>
                            </div>
                        </div>
                        <!-- Start About Me Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Skills</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="skills" class="form-control"  rows="8" cols="50"></textarea>
                            </div>
                        </div>
                        <!-- Start About Me Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Biographie</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="biographie" class="form-control"  rows="8" cols="50"></textarea>
                            </div>
                        </div>                       
                        <!-- Start Adressee Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Adresse</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="adresse"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="Description">
                            </div>
                        </div>
                        <!-- Start Web Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Web</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="siteweb" 
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="Web">
                            </div>
                        </div>
                        <!-- Start Email Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="email" 
                                   name="email"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="Email">
                            </div>
                        </div>                        
                        <!-- Start Facebook Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="facebook"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="Facebook">
                            </div>
                        </div>
                        <!-- Start Twitter Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="twitter"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="Twitter">
                            </div>
                        </div>
                        <!-- Start LinkedIn Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">LinkedIn</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="linkedin"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="LinkedIn">
                            </div>
                        </div> 
                        <!-- Start YouTube Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">YouTube</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="youtube"
                                   class="form-control" 
                                   autocomplete="off" 
                                   placeholder="youtube">
                            </div>
                        </div>                                                                                                                        
                        <!-- Start Phone Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">phone</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="phone"
                                   class="form-control"
                                   placeholder="phone">
                            </div>
                        </div>                        
                          <!-- Start Upload File -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label" for="upload">Image</label>
                              <div class="col-sm-10 col-md-4">
                                  <input 
                                      type="file" 
                                      name="image" 
                                      class="form-control"  
                                      id='image'>
                              </div>
                          </div>  
                          <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                          <span>NB :Lorsque vous ajouter ta bibliogrphie sera automatiquement afficher dans le site</span>                     
                         <!-- Start Submit Filed -->
                          <div class="form-group form-group-lg">
                              <div class="col-md-offset-2 col-sm-10">
                                  <input type="submit" name="Add Biography" value="Ajouter" class="btn btn-primary" id="upload">
                              </div>
                          </div>                              
                    </form>
               </div> 
            </section>    
            <?php }elseif($do == "Insert"){

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Ajouter ma Biobliographie</h1>";
            echo "<div class='container'>";
              // Get var from the form
              $userid        = $_POST['biouser'];
              $aboutme       = $_POST["aboutme"];
              $firstname     = $_POST["firstname"];
              $lastname      = $_POST["lastname"];                            
              $skills        = $_POST["skills"];
              $bio           = $_POST["biographie"];
              $adr           = $_POST['adresse'];
              $siteweb       = $_POST['siteweb'];
              $email         = $_POST["email"];
              $facebook      = $_POST["facebook"];
              $twitter       = $_POST["twitter"];
              $linkedin      = $_POST['linkedin'];
              $youtube       = $_POST["youtube"];              
              $phone         = $_POST["phone"];                          
              $tmp_name      = $_FILES['image']['name'];
              $destina       = "images/" . $tmp_name;
              move_uploaded_file($_FILES['image']['tmp_name'], $destina);              
              // Validate The form

                
                $formError = array();
                if (strlen($aboutme) < 3 ){
                  $formError[] = "About can't be less than <strong>3 characters</strong>";
                } 
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                  echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                        // Insert File info in Database
                        $stmt = $con->prepare("INSERT INTO 
                              biographie(BioUser,FirstName, LastName, AboutMe, Skills, Biographie, Adresse, Web,  Email, Facebook, LinkedIn, Youtube, Twitter, Phone, Image, Public) VALUES(:zbiouser, :zfirstname, :zlastname, :zabout, :zskills, :zbio, :zadresse,:zweb, :zmail, :zfacebook, :zlinkedin, :zyoutube, :zwitter, :zphone, :zimage, 1)");
                        $stmt->execute(array(
                               'zbiouser'       => $userid,
                               'zfirstname'     => $firstname,
                               'zlastname'      => $lastname,
                               'zabout'         => $aboutme,
                               'zskills'        => $skills,
                               'zbio'           => $bio,
                               'zadresse'       => $adr,
                               'zweb'           => $siteweb,
                               'zmail'          => $email,
                               'zfacebook'      => $facebook,
                               "zlinkedin"      => $linkedin,
                               'zyoutube'       => $youtube,
                               'zwitter'        => $twitter,
                               'zphone'         => $phone,
                               'zimage'         => $destina         
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Bio Inserted</div>";
                        redirectHome($theMsg, "back", 3);
 
                }
            }else{
                    echo '<h1 class="text-center">Add New  Events</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";

            } elseif ($do == "Edit") { // Edit Page 

            // Check if get request userid is numeric & get the  integer value  of It  

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM biographie WHERE BioUser=? LIMIT 1");            

            // Execute query
            $stmt->execute(array($biouser));

            // Fetch the data
            $row = $stmt->Fetch();

              // The Row Count 
            $count = $stmt->rowCount();

            // If there's such id show the form
         if ($count > 0 ){ ?>
         <section class="maBio">
          <div class="container">
                 <div class="row">
                     <div class="col-xs-12 heading">
                        <h2 class="h1 text-center">Modifier Bibliographie</h2>
                    </div>
                 </div>
                 <form class="form-horizontal form-center" action="?do=Update" method="POST" enctype="multipart/form-data">
                      <!-- Start About Me Filed -->
                        <input type="hidden" name="biouser" value="<?php echo $biouser?>">
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">About Me</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="aboutme" class="form-control"  rows="8" cols="50" >
                                  <?php echo $row['AboutMe'] ?>
                                </textarea>
                            </div>
                        </div>
                        <!-- Start About Me Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Skills</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="skills" class="form-control"  rows="8" cols="50" >
                                  <?php echo $row['Skills'] ?>
                                </textarea>
                            </div>
                        </div>
                        <!-- Start About Me Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Bibliographie</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="biographie" class="form-control"  rows="8" cols="50" >
                                  <?php echo $row['Skills'] ?>
                                </textarea>
                            </div>
                        </div>                       
                        <!-- Start Adressee Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Adresse</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="adresse"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['Adresse'] ?>" 
                                   placeholder="Description">
                            </div>
                        </div>
                        <!-- Start Web Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Web</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="siteweb"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['Web'] ?>"
                                   placeholder="Web">
                            </div>
                        </div>
                        <!-- Start Email Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="email" 
                                   name="email"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['Email'] ?>"
                                   placeholder="Email">
                            </div>
                        </div>                        
                        <!-- Start Facebook Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Facebook</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="facebook"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['Facebook'] ?>"
                                   placeholder="Facebook">
                            </div>
                        </div>
                        <!-- Start Twitter Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Twitter</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="twitter"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['Twitter'] ?>"
                                   placeholder="Twitter">
                            </div>
                        </div>
                        <!-- Start LinkedIn Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">LinkedIn</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="linkedin"
                                   class="form-control" 
                                   autocomplete="off" 
                                   value="<?php echo $row['LinkedIn'] ?>"
                                   placeholder="LinkedIn">
                            </div>
                        </div> 
                        <!-- Start YouTube Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">YouTube</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="url" 
                                   name="youtube"
                                   class="form-control" 
                                   autocomplete="off"
                                   value="<?php echo $row['Youtube'] ?>" 
                                   placeholder="youtube">
                            </div>
                        </div>                                                                                                                        
                        <!-- Start Phone Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">phone</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="phone"
                                   class="form-control" 
                                   placeholder="phone"
                                   value="<?php echo $row['Phone'] ?>">
                            </div>
                        </div>                        
                          <!-- Start Upload File -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label" for="upload">Image</label>
                              <div class="col-sm-10 col-md-4">
                                  <input 
                                      type="file" 
                                      name="image" 
                                      class="form-control"  
                                      id='image'>
                              </div>
                          </div>  
                          <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                     
                         <!-- Start Submit Filed -->
                          <div class="form-group form-group-lg">
                              <div class="col-md-offset-2 col-sm-10">
                                  <input type="submit" name="Edit Biography" value="Modifier" class="btn btn-primary" id="upload">
                              </div>
                          </div>                              
                    </form>             
              </div>
            </section>
        <?php
          // Else Show Error Message
         }else{
           echo '<h1 class="text-center">Edit Biography</h1>';
           echo "<div class='container'>";
           $theMsg = "<div class='alert alert-danger'>Theres No Such ID</div>";
           redirectHome($theMsg);
           echo "</div>";
         }
       }elseif ($do == "Update") {  // Update Page
            echo "<h1 class='text-center'>Modifier ma Biobliographie</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
              $id            = $_POST['biouser'];
              $aboutme       = $_POST["aboutme"];
              $skills        = $_POST["skills"];
              $bio           = $_POST["biographie"];
              $adr           = $_POST['adresse'];
              $web           = $_POST["siteweb"];
              $email         = $_POST["email"];
              $facebook      = $_POST["facebook"];
              $twitter       = $_POST["twitter"];
              $linkedin      = $_POST['linkedin'];
              $youtube       = $_POST["youtube"];              
              $phone         = $_POST["phone"];                          
              $tmp_name      = $_FILES['image']['name'];
              $destina       = "images/" . $tmp_name;
              move_uploaded_file($_FILES['image']['tmp_name'], $destina);
              

              // Validate The form
                
                $formError = array();
                if (strlen($aboutme) < 3 ){
                    $formError[] = "Biography can't be less than <strong>3 characters</strong>";
                }                                  

                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                  echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                
                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE biographie SET AboutMe=?, Skills=?, Biographie=?, Adresse=?, Web=?, Email=?, Facebook=?, LinkedIn=?, Youtube=?, Twitter=?, Phone=?, Image=? WHERE BioUser=?");
                $stmt->execute(array($aboutme, $skills, $bio, $adr, $web, $email, $facebook, $linkedin, $youtube, $twitter, $phone, $destina, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Biography Updated</div>";
                    redirectHome($theMsg, "back");
                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete Biographie Page

            echo "<h1 class='text-center'>Suppprimer ma Biobliographie</h1>";
            echo "<div class='container'>";

            // Select all data depend on thisID 

            $check = checkItem('BioUser', 'biographie', $biouser);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM biographie WHERE BioUser = :zbio");
               $stmt->bindParam(":zbio", $biouser);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Biography Deleted</div>"; 
                redirectHome($theMsg, "back");
        }else{
          $theMsg =  "<div class='alert alert-danger'>this #ID is not Exist</div>";
                redirectHome($theMsg);
        } 
        echo "</div>";   
       }

      include $tpl . "footer.php";
    }else{
      header("location: index.php");
      exit();
    }

    ob_end_flush();