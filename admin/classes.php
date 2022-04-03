<?php

      /*=======================================================
      ==== Classe Manage Page
      ==== You Can Add \ Edit | Delete Classe from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Classe";
    if (isset($_SESSION['Email'])){

      include "init.php";

       $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";
       $id = '#CLASSE_';

       if ($do == "Manage"){  // Manage Item Page 
             
            // Select All Study except Admin
            $stmt = $con->prepare("SELECT * FROM classes ORDER BY Name ASC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $classes = $stmt->fetchAll();
            if (! empty($classes)){
            ?>
            <div class="container">
                <h1 class="text-center">Manage Classe</h1>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>#ID</td>
                            <td>#Level</td>
                            <td>#Année Universitaire</td>
                            <td>#Student</td>
                            <td>#Teachers</td>
                            <td>#Control</td>
                        </tr>
                        <?php
                             $x = '1';
                             foreach ($classes as $classe) {
                                echo "<tr>";
                                   echo "<td>" . $id . $classe['ClasseId'] . "</td>";                                
                                   echo "<td>" . $classe['Name'] . "</td>";
                                   echo "<td>" . $classe['A_University'] . "</td>";
                                   echo "<td><a href='users.php?do=Manage&level=$x&groupid=2' class='lien'>"  .  countItems('UserId', 'users', 'Level', $x, '2') . "</a></td>";
                                   echo "<td><a href='users.php?do=Manage&level=$x&groupid=1' class='lien'>"  .  countItems('UserId', 'users', 'Level', $x, '1') . "</a></td>";                                                                      
                                   echo "<td>
                                          <a href='classes.php?do=Edit&levelid=". $classe['ClasseId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                          <a href='classes.php?do=Delete&levelid=". $classe['ClasseId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                    echo "</td>";                                                                            
                                echo "<tr>";  
                                $x++;
                             }
                        ?>                  
                    </table>
                </div>
                <a href='classes.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Level</a>
            </div>
             <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No classe to Show</div>";
                 echo "<a href='classes.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New classe</a>";
               echo "</div>";  
            }?>
            
    <?php   }elseif ($do == "Add"){// Add New Level ?> 
                 <div class="container">
                    <h1 class="text-center">Add New Level</h1>
                    <form class="form-horizontal form-center" action="?do=Insert" method="POST">
 
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control" 
                                    required="required" 
                                    placeholder="X Année">
                            </div>
                        </div>
                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Année Universitaire</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="universitaire"
                                   class="form-control" 
                                   placeholder="20xx/20xx" 
                                   autocomplete="off" 
                                   required="required">
                            </div>
                        </div>
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Add Classe" value="Add Level" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>
                </div>           
   
          <?php }elseif($do == "Insert"){

          if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert Level</h1>";
            echo "<div class='container'>";
                // Get var from the form
                $name             = $_POST["name"];
                $university       = $_POST["universitaire"];                                        
                
                // Validate The form
                
                $formError = array();
                if (empty($name)){
                    $formError[] = "Name can't be<strong> Empty</strong>";
                }
                if (empty($university)){
                    $formError[] = "Année Universitaire can't be<strong> Empty</strong>";
                }                               
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                    
                        // Insert Année Universitaire info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            classes(name, A_University) VALUES(:zname, :zuniver)");
                        $stmt->execute(array(
                               'zname'      => $name,
                               'zuniver'    => $university
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Level Inserted</div>";
                        redirectHome($theMsg, "back", 3);
                }
            }else{
                    echo '<h1 class="text-center">Add New Level</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";
      

       }elseif ($do == "Edit") { // Edit Page 

        // Check if get request userid is numeric & get the  integer value  of It
        $levelid =  (isset($_GET['levelid']) && is_numeric($_GET['levelid'])) ? intval($_GET['levelid']) : 0; 

        // Select all data depend on thisID 
        $stmt = $con->prepare("SELECT * FROM classes WHERE ClasseId=?");

        // Execute query
        $stmt->execute(array($levelid));

        // Fetch the data
        $level = $stmt->Fetch();

        // The Row Count 
        $count = $stmt->rowCount();

        // If there's such id show the form
        if ($count > 0 ){ ?>

           <div class="container">
                    <h1 class="text-center">Edit Item</h1>
                    <form class="form-horizontal form-center" action="?do=Update" method="POST">
                        <input type="hidden" name="levelid" value="<?php echo $levelid ?>">
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control" 
                                    required="required"
                                    placeholder="Name of the Item"
                                    value="<?php echo $level['Name'] ?>">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Année Unirsitaire</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="auniver"
                                   class="form-control"
                                   autocomplete="off" 
                                   value="<?php echo $level['A_University'] ?>"
                                   required="required" 
                                   placeholder="2016/2017">
                            </div>
                        </div>                       
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Edit Classe" value="Edit Level" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>              
                </div>           
        <?php
          // Else Show Error Message
         }else{
           echo '<h1 class="text-center">Edit Level</h1>';
           echo "<div class='container'>";
            $theMsg = "<div class='alert alert-danger'>Theres No Such ID</div>";
          redirectHome($theMsg);
            echo "</div>";
         }      
       }elseif ($do == "Update") {  // Update Item

            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
              $id            = $_POST['levelid'];
              $name          = $_POST["name"];
              $university    = $_POST["auniver"];
              
                // Validate The form
                
                $formError = array();
                if (empty($name)){
                    $formError[] = "Name can't be<strong> Empty</strong>";
                }
                if (empty($university)){
                    $formError[] = "Année universitaire can't be<strong> Empty</strong>";
                }                               
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){

                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE classes  SET 
                   Name=?,
                   A_University =?
                   WHERE ClasseId=?");
                $stmt->execute(array($name, $university, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Level Updated</div>";
                    redirectHome($theMsg, "back");

                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";      

       }elseif($do == "Delete"){ // Delete Classe Page

            echo "<h1 class='text-center'>Delete Item</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $levelid =  (isset($_GET['levelid']) && is_numeric($_GET['levelid'])) ? intval($_GET['levelid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('ClasseId', 'classes', $levelid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM classes WHERE ClasseId= :zclasse");
               $stmt->bindParam(":zclasse", $levelid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Level Deleted</div>"; 
                redirectHome($theMsg,"bacl");
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