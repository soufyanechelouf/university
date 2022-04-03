<?php

      /*=======================================================
      ==== Manage News Page
      ==== You Can Add \ Edit | Delete Stydy from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "News";
    if (isset($_SESSION["Email"])){
      include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

        if ($do == "Manage"){  // Manage News Page 

            // Select All
            $stmt = $con->prepare("SELECT *
                                   FROM
                                        news 
                                   ORDER BY Date DESC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $rows = $stmt->fetchAll();
            if (! empty($rows)){
            ?>

            <div class="container">
              <div class="table-responsive">
                <h1 class="text-center">Manage News</h1>
                <table class="main-table text-center table table-bordered">
                  <tr>
                    <td>#ID</td>                       
                    <td>#Title</td>  
                    <td>#Type</td>                       
                    <td>#InSlider</td>
                    <td>#PostedBy</td>
                    <td>#Date</td>
                    <td>#Control</td>
                  </tr>
                  <?php 
                             foreach ($rows as $row) {
                              $id = '#N' . substr($row['Type'], 0, 2) . '_';
                              echo "<tr'>";
                                 echo "<td>" . $id .  $row['NewsId'] . "</td>";
                                 echo "<td>" . $row['Title'] . "</td>";
                                 echo "<td>" . $row['Type'] . "</td>";
                                 echo "<td>" . $row['InSlider'] . "</td>"; 
                                 echo "<td>" . $row['PostedBy'] . "</td>";
                                 echo "<td>" . $row['Date'] . "</td>";                                
                                 echo "<td>
                                        <a href='news.php?do=Edit&newsid=". $row['NewsId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>                                        
                                        <a href='news.php?do=Delete&newsid=". $row['NewsId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                 echo  "</td>";
                              echo "<tr>";  
                             }
                  ?>              
                </table>
              </div>
              <a href='news.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add News</a>
            </div>
         <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No News to Show</div>"; ?>
                 <a href='news.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add News</a>
                <?php             
               echo "</div>"; 
            }?>
       <?php }elseif ($do == "Add"){ //Add New News ?>

          <div class="container">
              <h1 class="text-center">Add News</h1>
              <div class="row">
                 <div class="col-lg-8">
                   <form class="form-horizontal form-center" action="?do=Insert" method="POST" enctype="multipart/form-data">
   
                          <!-- Start Name Filed -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label"> Title</label>
                              <div class="col-sm-10 col-md-4">
                                  <input 
                                      type="text" 
                                      name="title" 
                                      class="form-control live" 
                                      required="required" 
                                      data-class='.live-title'
                                      placeholder="Title">
                              </div>
                          </div>
                          <!-- Start Description Filed -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-10 col-md-4">
                                  <textarea name="description" class="form-control live" id="area" rows="8" cols="50" maxlength="175" data-class='.live-desc' style="width: 360px; height: 150px;" ></textarea>
                              <div class="message"></div> 
                              </div>
                          </div>
                          <!-- Start Details Filed -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label">Details</label>
                              <div class="col-sm-10 col-md-4">                       
                                  <textarea name="details" class="form-control live"  rows="8" cols="50" style="width: 360px; height: 300px;" ></textarea>
                              </div>
                          </div>
                          <!-- Start Type Filed -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label">Type</label>
                              <div class="col-sm-10 col-md-4">
                                  <select name="type" class="form-control live" data-class='.live-cat'>
                                    <option value="Pedagogique">Pedagogique</option>
                                    <option value="General">general</option>
                                    <option value="Club">club</option>
                                  </select>
                              </div>
                          </div>   
                          <!-- Start Type Filed -->
                          <div class="form-group form-group-lg">
                               <label class="col-sm-2 control-label">InSlider</label>
                               <div class="col-sm-10 col-md-4">
                                  <select name="inslider" class="form-control">   
                                       <option value="0">No</option>          
                                       <option value="1">Yes</option>
                                  </select> 
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
                          <!-- Start Posted By Filed -->
                          <div class="form-group form-group-lg">
                              <label class="col-sm-2 control-label">Posted By</label>
                              <div class="col-sm-10 col-md-4">
                                  <input 
                                     type="text" 
                                     name="postedby"
                                     class="form-control live" 
                                     autocomplete="off" 
                                     required="required" 
                                     data-class='.live-poster'  
                                     placeholder="Posted By">
                              </div>
                          </div>                                                 
                          <!-- Start Submit Filed -->
                          <div class="form-group form-group-lg">
                              <div class="col-md-offset-2 col-sm-10">
                                  <input type="submit" name="Add News" value="Add News" class="btn btn-primary" id="upload">
                              </div>
                          </div>                             
                      </form>                   
                 </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 live-preview">
                      <div class="image">
                         <img src="" alt="image" class="img-responsive center-block img">
                       </div>
                       <div class="article">
                         <h2 class="text-center live-title"><a href="#"></a></h2>
                         <p class="lead live-desc"></p>
                        <hr>
                        Posted In : <span class="live-cat"></span><br>
                        Posted By : <span class="live-poster"></span>
                     </div>
                 </div>               
              </div>
             </div>     
            <?php }elseif($do == "Insert"){

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert News</h1>";
            echo "<div class='container'>";
              // Get var from the form
              $title       = $_POST["title"];
              $desc        = $_POST["description"];
              $details     = $_POST["details"];
              $type        = $_POST["type"];
              $inslder     = $_POST['inslider']; 
              $postedby    = $_POST['postedby'];
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
                            news(Title, Description, Details, Type, InSlider, PostedBy, Image, Date) VALUES(:ztitle, :zdesc, :zdetails, :ztype, :zslider, :zpost, :zimage, now() )");
                        $stmt->execute(array(
                               'ztitle'       => $title,
                               'zdesc'        => $desc,
                               'zdetails'     => $details,
                               'ztype'        => $type,
                               'zslider'      => $inslder,
                               'zpost'        => $postedby,
                               'zimage'       => $destina

                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>News Inserted</div>";
                        redirectHome($theMsg, "back", 3);
 
                }
            }else{
                    echo '<h1 class="text-center">Add New  File</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";

            } elseif ($do == "Edit") { // Edit Page 

            // Check if get request userid is numeric & get the  integer value  of It
            $newsid =  (isset($_GET['newsid']) && is_numeric($_GET['newsid'])) ? intval($_GET['newsid']) : 0;  

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM news WHERE NewsId=? LIMIT 1");            

            // Execute query
            $stmt->execute(array($newsid));

            // Fetch the data
            $row = $stmt->Fetch();

              // The Row Count 
            $count = $stmt->rowCount();

            // If there's such id show the form
         if ($count > 0 ){ ?>

    <div class="container">
      <h1 class="text-center">Edit News</h1>
        <div class="row">
           <div class="col-md-8">
            <form class="form-horizontal form-center" action="?do=Update" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="newsid" value="<?php echo $newsid ?>">
                  <!-- Start Title Filed -->
                  <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10 col-md-4">
                      <input 
                                type="text" 
                                name="title" 
                                class="form-control live"
                                data-class=".live-title" 
                                autocomplete="off" 
                                value="<?php echo $row['Title'] ?>" >
                    </div>
                  </div>
                  <!-- Start Description Filed -->
                  <div class="form-group form-group-lg">
                     <label class="col-sm-2 control-label">Description</label>
                     <div class="col-sm-10 col-md-4">
                          <textarea name="description" class="form-control live"  id="area" rows="8" cols="50" maxlength="175" data-class='.live-desc' style="width: 360px; height: 100px;" ><?php echo $row['Description'] ?></textarea>
                            <div class="message"></div> 
                       </div>
                  </div>
                  <!-- Start Details Filed -->
                   <div class="form-group form-group-lg">
                      <label class="col-sm-2 control-label">Details</label>
                       <div class="col-sm-10 col-md-4">                       
                          <textarea name="details" class="form-control live"  rows="8" cols="50" style="width: 360px; height: 300px;" ><?php echo $row['Details'] ?></textarea>
                        </div>
                   </div>                                                          
                    <!-- Start Type Filed -->
                    <div class="form-group form-group-lg">
                         <label class="col-sm-2 control-label">Type</label>
                         <div class="col-sm-10 col-md-4">
                            <select name="type" class="form-control live" data-class='.live-cat'>   
                                 <option value="Pedagogique"<?php if($row['Type'] == 'Pedagogique')
                                    echo 'selected';?>>Pedagogique</option>          
                                 <option value="General"<?php if($row['Type'] == 'General')
                                    echo 'selected';?>>General</option>
                                 <option value="Club"<?php if($row['Type'] == 'Club')
                                    echo 'selected';?>>Club</option>
                            </select> 
                        </div>
                    </div>  
                    <!-- Start InSlider Filed -->
                    <div class="form-group form-group-lg">
                         <label class="col-sm-2 control-label">InSlider</label>
                         <div class="col-sm-10 col-md-4">
                            <select name="inslider" class="form-control">   
                                 <option value="0"<?php if($row['InSlider'] == '0')
                                    echo 'selected';?>>No</option>          
                                 <option value="1"<?php if($row['InSlider'] == '1')
                                    echo 'selected';?>>Yes</option>
                            </select> 
                        </div>
                    </div>
                    <!-- Start Posted By Filed -->
                       <div class="form-group form-group-lg">
                          <label class="col-sm-2 control-label">Posed By</label>
                          <div class="col-sm-10 col-md-4">
                              <input 
                                 type="text" 
                                 name="postedby"
                                 value="<?php echo $row['PostedBy']; ?>"                           
                                 class="form-control live"
                                 data-class='.live-poster' 
                                 autocomplete="off" 
                                 required="required" >
                            </div>
                      </div>                         
                    <!-- Start Upload Image -->
                      <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="upload">Image</label>
                          <div class="col-sm-10 col-md-4">
                            <input 
                               type="file" 
                               name="picture"
                               value="<?php echo $row['Image']; ?>" 
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
            <div class="col-md-4 col-sm-12 col-xs-12 live-preview">
                <div class="image">
                  <img src="<?php echo $row['Image'] ?>" alt="image" class="img-responsive center-block img">
                  </div>
                <div class="article">
                  <h2 class="text-center live-title"><?php echo $row['Title'] ?></h2>
                  <p class="lead live-desc"><?php echo $row['Description'] ?></p>
                  <hr>
                  Posted In : <span class="live-cat"><?php echo $row['Type'] ?></span><br>
                  Posted By : <span class="live-poster"><?php echo $row['PostedBy'] ?></span>
               </div>
             </div>             
      </div>
    </div>
        <?php
          // Else Show Error Message
         }else{
           echo '<h1 class="text-center">Edit News</h1>';
           echo "<div class='container'>";
            $theMsg = "<div class='alert alert-danger'>Theres No Such ID</div>";
          redirectHome($theMsg);
            echo "</div>";
         }
       }elseif ($do == "Update") {  // Update Page
            echo "<h1 class='text-center'>Update News</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
                $id          = $_POST['newsid'];
                $title       = $_POST["title"];
                $desc        = $_POST["description"];
                $details     = $_POST["details"];
                $type        = $_POST["type"];
                $inslider    = $_POST['inslider'];
                $postedby    = $_POST['postedby']; 
                $tmp_name    = $_FILES['picture']['name'];
                $destina     = "images/" . $tmp_name;
                move_uploaded_file($_FILES['picture']['tmp_name'], $destina);                    
                

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
                $stmt = $con->prepare("UPDATE news SET Title=?, Description=?, Details=?, Type=?, InSlider=?, PostedBy=?, Image=? WHERE NewsId=?");
                $stmt->execute(array($title, $desc, $details, $type, $inslider, $postedby, $destina, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>News Updated</div>";
                    redirectHome($theMsg, "back");
                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete News Page

            echo "<h1 class='text-center'>Delete File</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $newsid =  (isset($_GET['newsid']) && is_numeric($_GET['newsid'])) ? intval($_GET['newsid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('NewsId', 'news', $newsid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM news WHERE NewsId = :znews");
               $stmt->bindParam(":znews", $newsid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check News Deleted</div>"; 
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