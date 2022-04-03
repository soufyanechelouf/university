<?php

      /*=======================================================
      ==== Notifications Manage Page
      ==== You Can Add \ Edit | Delete Notifications from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Notifications";
    $id = '#NOT_';
    if (isset($_SESSION['Email'])){

      include "init.php";

       $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

       if ($do == "Manage"){  // Manage Item Page 
             
            // Select All Study except Admin
            $stmt = $con->prepare("SELECT notifications.*,
                                           classes.Name AS Destinations
                                   FROM
                                           notifications 
                                   INNER JOIN classes ON classes.ClasseId = notifications.NotDestina
                                   ORDER BY Date DESC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $notifications = $stmt->fetchAll();
            if (! empty($notifications)){
            ?>
            <div class="container">
                <h1 class="text-center">Manage Notifications</h1>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>#ID</td>
                            <td>#Type</td>
                            <td>#Subject</td>
                            <td>#Destinations</td>
                            <td>#Categorie</td>
                            <td>#Valabe Until</td>                            
                            <td>#Control</td>
                        </tr>
                        <?php
                             foreach ($notifications as $noti) {
                                echo "<tr>";
                                   echo "<td>" . $id . $noti['NotId'] . "</td>";
                                   echo "<td>" . $noti['Type'] . "</td>";                      
                                   echo "<td>" . $noti['Subject'] . "</td>";
                                   echo "<td>" . $noti['Destinations'] . "</td>";
                                   echo "<td>" . $noti['NotGroupId'] . "</td>";  
                                   echo "<td>" . $noti['Valabe'] . "</td>";                                                                                                             
                                   echo "<td>
                                          <a href='notifacations.php?do=Edit&notid=". $noti['NotId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                          <a href='notifacations.php?do=Delete&notid=". $noti['NotId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                    echo "</td>";                                                                            
                                echo "<tr>";  
                             }
                        ?>                  
                    </table>
                </div>
                <a href='notifacations.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Post Notifications</a>
            </div>
             <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No notifications to Show</div>";
                 echo "<a href='notifacations.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New notifications</a>";
               echo "</div>";  
            }?>
            
    <?php   }elseif ($do == "Add"){// Add New Level ?> 
                 <div class="container">
                    <h1 class="text-center">Post New Notification</h1>
                    <form class="form-horizontal form-center" action="?do=Insert" method="POST" enctype="multipart/form-data">

                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> Type</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="type" 
                                    class="form-control" 
                                    required="required" 
                                    placeholder="Type">
                            </div>
                        </div>

                        <!-- Start Subject Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Subject</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="subject"  rows="8" cols="50" maxlength="100" id="area"></textarea>
                                <div class="message"></div>
                            </div>
                        </div>

                        <!-- Start Destination Filed -->
                        <div class="form-group form-group-lg"">
                            <label class="col-sm-2 control-label">Destination</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control" name="destina">  
                                    <?php
                                       $stmt = $con->prepare("SELECT * FROM classes");
                                       $stmt->execute();
                                       $classes = $stmt->fetchAll();
                                       foreach ($classes as $classe) {
                                           echo "<option value='". $classe['ClasseId'] ."'>". $classe['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div> 
                        <!-- Start Categorie Filed -->
                         <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Categorie</label>
                             <div class="col-sm-10 col-md-4">
                                <select name="categorie" class="form-control live" data-class='.live-cat'>
                                  <option value="All">All</option> 
                                  <option value="students">Students</option>
                                  <option value="teachers">Teachers</option>
                                </select>
                             </div>
                        </div>   
                        <!-- Start Valabe Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Valabe Until</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="date" 
                                   name="valabe"
                                   class="form-control" 
                                   required="required">
                            </div>
                        </div>   
                        <!-- Start File Field -->                        
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label" for="upload">File</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="file" 
                                    name="file"
                                    id="upload" 
                                    class="form-control" 
                                    placeholder="PDF or DOCX File" 
                                    id='file'>
                            </div>
                        </div>  
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                                                                  
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Add Item" value="Post Notification" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>
                </div>           
   
          <?php }elseif($do == "Insert"){

          if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Post Notifications</h1>";
            echo "<div class='container'>";
                // Get var from the form
                $type                = $_POST["type"];
                $subject             = $_POST["subject"];
                $destina             = $_POST["destina"];                              
                $cat                 = $_POST["categorie"];    
                $valabe              = $_POST["valabe"];
                $tmp_name            = $_FILES['file']['name'];
                $destination         = "files/" . $tmp_name;
                move_uploaded_file($_FILES['file']['tmp_name'], $destination);                                                  
                // Validate The form
                
                $formError = array();
                if (empty($type)){
                    $formError[] = "type can't be<strong> Empty</strong>";
                }                
                if (empty($subject)){
                    $formError[] = "Subject can't be<strong> Empty</strong>";
                }                                                           
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                    
                        // Insert Année Universitaire info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            notifications(Type, subject, NotDestina, NotGroupId, Date, Valabe,File) VALUES(:ztype, :zsubject, :zdestina, :zcat, now(), :zvalabe, :zfile)");
                        $stmt->execute(array(
                               'ztype'         => $type,
                               'zsubject'      => $subject,
                               'zdestina'      => $destina,
                               'zcat'          => $cat,
                               'zvalabe'       => $valabe,
                               'zfile'         => $destination                                                              
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Notifications Successfully Posted</div>";
                        redirectHome($theMsg, "back", 3);
                }
            }else{
                    echo '<h1 class="text-center">Post New Notifications</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";
      

       }elseif ($do == "Edit") { // Edit Page 

        // Check if get request userid is numeric & get the  integer value  of It
        $notid =  (isset($_GET['notid']) && is_numeric($_GET['notid'])) ? intval($_GET['notid']) : 0; 

        // Select all data depend on thisID 
        $stmt = $con->prepare("SELECT * FROM notifications WHERE NotId=?");

        // Execute query
        $stmt->execute(array($notid));

        // Fetch the data
        $noti = $stmt->Fetch();

        // The Row Count 
        $count = $stmt->rowCount();

        // If there's such id show the form
        if ($count > 0 ){ ?>

           <div class="container">
                    <h1 class="text-center">Edit Notificaions</h1>
                    <form class="form-horizontal form-center" action="?do=Update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="notid" value="<?php echo $notid ?>">
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="type" 
                                    class="form-control" 
                                    required="required"
                                    value="<?php echo $noti['Type'] ?>" 
                                    placeholder="Type">
                            </div>
                        </div>                        
                        <!-- Start Subject Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Subject</label>
                            <div class="col-sm-10 col-md-4">
                                <textarea  name="subject"  rows="8" cols="50" maxlength="100" id="area"><?php echo $noti['Subject'] ?></textarea>
                                <div class="message"></div>
                            </div>
                        </div>

                        <!-- Start Destination Filed -->
                        <div class="form-group form-group-lg"">
                            <label class="col-sm-2 control-label">Destination</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="destina" class="form-control">                                
                                    <?php
                                       $stmt1 = $con->prepare("SELECT * FROM classes");
                                       $stmt1->execute();
                                       $classes = $stmt1->fetchAll();
                                       foreach ($classes as $classe) {
                                       echo "<option value='". $classe['ClasseId'] ."'"; 
                                       if($classe['ClasseId'] == $noti['NotDestina']){
                                      echo 'selected';} 
                                      echo ">". $classe['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div> 
                        <!-- Start Categorie Filed -->
                         <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Categorie</label>
                             <div class="col-sm-10 col-md-4">
                                <select name="categorie" class="form-control">   
                                     <option value="All"<?php if($noti['NotGroupId'] == 'All')
                                        echo 'selected';?>>All</option>                                 
                                     <option value="students"<?php if($noti['NotGroupId'] == 'students')
                                        echo 'selected';?>>Students</option>          
                                     <option value="teahcers"<?php if($noti['NotGroupId'] == 'teahcers')
                                        echo 'selected';?>>Teahcers</option>
                                </select>  
                             </div>
                        </div> 
                        <!-- Start Valabe Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Valabe Until</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="date" 
                                   name="valabe"
                                   class="form-control" >
                                   <?php echo $noti['Valabe'] ?>
                            </div>
                        </div>     
                    <!-- Start File Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="upload">File</label>
                          <div class="col-sm-10 col-md-4">
                            <input 
                                type="file" 
                                name="f"
                                class="form-control" 
                                placeholder="File" 
                                id='file'>
                          </div>
                      </div>  
                      <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                                                                    
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Edit Not" value="Post Notification" class="btn btn-primary">
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
       }elseif ($do == "Update") {  // Update Notification

            echo "<h1 class='text-center'>Update Notification</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
                $id                  = $_POST['notid']; 
                $type                = $_POST["type"];                             
                $subject             = $_POST["subject"];
                $destina             = $_POST["destina"];                             
                $cat                 = $_POST["categorie"];  
                $valabe              = $_POST["valabe"];  
                $tmp_name            = $_FILES['f']['name'];
                $destination         = "files/" . $tmp_name;
                move_uploaded_file($_FILES['f']['tmp_name'], $destina);                                

                // Validate The form
                
                $formError = array();
                if (empty($type)){
                    $formError[] = "type can't be<strong> Empty</strong>";
                }                 
                if (empty($subject)){
                    $formError[] = "Subject can't be<strong> Empty</strong>";
                }                                  
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){

                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE notifications  SET 
                   Type=?,
                   Subject=?,
                   NotDestina =?,
                   NotGroupId=?,
                   Valabe=?,
                   File=?
                   WHERE NotId=?");
                 $stmt->execute(array($type, $subject, $destina, $cat, $valabe,$destination, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Notifacation Updated</div>";
                    redirectHome($theMsg, "back");

                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";      

       }elseif($do == "Delete"){ // Delete Classe Page

            echo "<h1 class='text-center'>Delete Notifacation</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $notid =  (isset($_GET['notid']) && is_numeric($_GET['notid'])) ? intval($_GET['notid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('NotId', 'notifications', $notid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM notifications WHERE NotId= :znoti");
               $stmt->bindParam(":znoti", $notid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Notifacation Deleted</div>"; 
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