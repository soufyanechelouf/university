<?php

      /*=======================================================
      ==== Manage Events Page
      ==== You Can Add \ Edit | Delete Events from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Events";
    $id = '#EVENT_';
    if (isset($_SESSION["Email"])){
      include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

        if ($do == "Manage"){  // Manage News Page 

            // Select All
            $stmt = $con->prepare("SELECT *
                                   FROM
                                        events
                                   ORDER BY Date DESC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $rows = $stmt->fetchAll();
            if (! empty($rows)){
            ?>

            <div class="container">
              <div class="table-responsive">
                <h1 class="text-center">Manage Events</h1>
                <table class="main-table text-center table table-bordered">
                  <tr>
                    <td>#ID</td>                       
                    <td>#Title</td> 
                    <td>#Adresse</td>
                    <td>#Image</td>
                    <td>#Start</td>
                    <td>#End</td>                    
                    <td>#Control</td>
                  </tr>
                  <?php 
                             foreach ($rows as $row) {
                              echo "<tr>";
                                 echo "<td>" . $id . $row['EventId'] . "</td>";
                                 echo "<td>" . $row['Title'] . "</td>";
                                 echo "<td>" . $row['Adresse'] . "</td>";
                                 echo "<td>" . $row['Image'] . "</td>";
                                 echo "<td>" . $row['Date'] . "</td>";
                                 echo "<td>" . $row['EndDate'] . "</td>";                                 

                                 echo "<td>
                                        <a href='events.php?do=Edit&eventid=". $row['EventId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                        <a href='events.php?do=Delete&eventid=". $row['EventId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                 echo  "</td>";
                              echo "<tr>";  
                             }
                  ?>              
                </table>
              </div>
              <a href='events.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Event</a>
            </div>
         <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No News to Show</div>"; ?>
                 <a href='events.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New Event</a>
                <?php             
               echo "</div>"; 
            }?>
       <?php }elseif ($do == "Add"){ //Add New Events ?>
          <div class="container">
                 <h1 class="text-center">Add Events</h1>
                 <form class="form-horizontal form-center" action="?do=Insert" method="POST" enctype="multipart/form-data">
 
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> Title</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="title" 
                                    class="form-control" 
                                    required="required" 
                                    placeholder="Title">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="description"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required" 
                                   placeholder="Description">
                            </div>
                        </div>
                        <!-- Start Adress Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Adresse</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="adresse"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required" 
                                   placeholder="Description">
                            </div>
                        </div>
                        <!-- Start Facebook Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Page Facebook</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="link" 
                                   name="facebook"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required" 
                                   placeholder="Description">
                            </div>
                        </div>                        
                        <!-- Start Start Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Start Date</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="datetime-local" 
                                   name="startdate"
                                   class="form-control" 
                                   required="required">
                            </div>
                        </div>    
                        <!-- Start End Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">End Date</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="datetime-local" 
                                   name="enddate"
                                   class="form-control" 
                                   required="required">
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
                                  <input type="submit" name="Add News" value="Add Events" class="btn btn-primary" id="upload">
                              </div>
                          </div>                              
                    </form>
               </div>     
            <?php }elseif($do == "Insert"){

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert Events</h1>";
            echo "<div class='container'>";
              // Get var from the form
              $title       = $_POST["title"];
              $desc        = $_POST["description"];
              $adr         = $_POST["adresse"];
              $facebook    = $_POST["facebook"];              
              $startdate   = $_POST['startdate'];
              $enddate     = $_POST['enddate'];              
              $tmp_name    = $_FILES['image']['name'];
              $destina     = "images/" . $tmp_name;
              move_uploaded_file($_FILES['image']['tmp_name'], $destina);              

              // Validate The form
                
                $formError = array();
                if (strlen($title) < 3 ){
                  $formError[] = "Title can't be less than <strong>3 characters</strong>";
                }
                if (strlen($desc) < 3 ){
                    $formError[] = "Description can't be less than <strong>3 characters</strong>";
                }  
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                  echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                    
                        // Insert File info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            events(Title, Description, Image, Adresse, Facebook, Date, EndDate) VALUES(:ztitle, :zdesc, :zimage, :zadresse, :zfacebook, :zstart, :zend )");
                        $stmt->execute(array(
                               'ztitle'       => $title,
                               'zdesc'        => $desc,
                               'zadresse'     => $adr,
                               'zfacebook'     => $facebook,                               
                               'zstart'       => $startdate,
                               'zend'         => $enddate,
                               'zimage'       => $destina         
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Events Inserted</div>";
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
            $eventid =  (isset($_GET['eventid']) && is_numeric($_GET['eventid'])) ? intval($_GET['eventid']) : 0;  

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM events WHERE EventId=? LIMIT 1");            

            // Execute query
            $stmt->execute(array($eventid));

            // Fetch the data
            $row = $stmt->Fetch();

              // The Row Count 
            $count = $stmt->rowCount();

            // If there's such id show the form
         if ($count > 0 ){ ?>

          <div class="container">
              <h1 class="text-center">Edit Events</h1>
            <form class="form-horizontal form-center" action="?do=Update" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="eventid" value="<?php echo $eventid ?>">
                      <!-- Start Title Filed -->
                      <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10 col-md-4">
                          <input 
                                    type="text" 
                                    name="title" 
                                    class="form-control" 
                                    autocomplete="off" 
                                    value="<?php echo $row['Title'] ?>" >
                        </div>
                      </div>
                        <!-- Start Description Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="description" 
                                    class="form-control"
                                    value="<?php echo $row['Description'] ?>">
                            </div>
                        </div>  
                        <!-- Start Description Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Adresse</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="adresse" 
                                    class="form-control"
                                    value="<?php echo $row['Adresse'] ?>">
                            </div>
                        </div>
                        <!-- Start Description Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Page Facebook</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="link" 
                                    name="facebook" 
                                    class="form-control"
                                    value="<?php echo $row['Facebook'] ?>">
                            </div>
                        </div>                        
                        <!-- Start Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Start</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="datetime-local" 
                                   name="startdate"
                                   class="form-control" 
                                   value="<?php echo $row['EndDate'] ?>" 
                                   required="required">
                                   <?php echo $row['Date']; ?>
                            </div>
                        </div>   
                        <!-- Start Date Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">End</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="datetime-local" 
                                   name="enddate"
                                   class="form-control" 
                                   required="required">
                                   <?php echo $row['EndDate']; ?>
                            </div>
                        </div>                                           
                    <!-- Start Upload Image -->
                      <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="upload">Image</label>
                          <div class="col-sm-10 col-md-4">
                            <input 
                               type="file" 
                               name="photo"
                               class="form-control"  
                               id='image'>
                           </div>
                      </div>  
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                      
                <!-- Start Submit Filed -->
                <div class="form-group form-group-lg">
                  <div class="col-md-offset-2 col-sm-10">
                    <input 
                              type="submit" 
                              name="Save" 
                              value="Save" 
                              class="btn btn-primary">
                  </div>
                </div>
            </form>
          </div>
        <?php
          // Else Show Error Message
         }else{
           echo '<h1 class="text-center">Edit Events</h1>';
           echo "<div class='container'>";
            $theMsg = "<div class='alert alert-danger'>Theres No Such ID</div>";
          redirectHome($theMsg);
            echo "</div>";
         }
       }elseif ($do == "Update") {  // Update Page
            echo "<h1 class='text-center'>Update Events</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
                $id          = $_POST['eventid'];
                $title       = $_POST["title"];
                $desc        = $_POST["description"];
                $adr         = $_POST["adresse"];
                $facebook    = $_POST["facebook"];                
                $start       = $_POST["startdate"];
                $end         = $_POST["enddate"];                
                $tmp_name    = $_FILES['photo']['name'];
                $destina     = "images/" . $tmp_name;
                move_uploaded_file($_FILES['photo']['tmp_name'], $destina);
              

              // Validate The form
                
                $formError = array();
                if (strlen($title) < 3 ){
                    $formError[] = "Title can't be less than <strong>3 characters</strong>";
                }  
                if (strlen($desc) < 3  ){
                    $formError[] = "Description can't be more than <strong>20 characters</strong>";
                  }                                 

                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                  echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                
                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE events SET Title=?, Description=?, Adresse=?, Facebook=?, Date=?, Date=?, Image=? WHERE EventId=?");
                $stmt->execute(array($title, $desc, $adr, $facebook, $start, $end,  $destina, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Event Updated</div>";
                    redirectHome($theMsg, "back");
                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete Event Page

            echo "<h1 class='text-center'>Delete Events</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
           $eventid =  (isset($_GET['eventid']) && is_numeric($_GET['eventid'])) ? intval($_GET['eventid']) : 0;

            // Select all data depend on thisID 

            $check = checkItem('EventId', 'events', $eventid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM events WHERE EventId = :zevent");
               $stmt->bindParam(":zevent", $eventid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Event Deleted</div>"; 
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