<?php

      /*=======================================================
      ==== Manage Study Page
      ==== You Can Add \ Edit | Delete Study from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Study";
    if (isset($_SESSION["Email"])){
      include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

        $level =  (isset($_GET['level']) && is_numeric($_GET['level'])) ? intval($_GET['level']) : 0;
        $type = (isset($_GET['type'])) ? ($_GET['type']) : 0;
        
            ?>
        <div class="container home-stat text-center">
            <h1>STUDY</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="stat st-members">
                      <i class='fa fa-book'></i>
                      <div class="info">
                        Total Cours
                       <span><?php echo total('StudyId', 'study', 'Type', 'Cour') ?></span>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat st-items">
                        <i class='fa fa-file-text-o'></i>
                        <div class="info">
                            Total Exams
                             <span><?php echo total('StudyId', 'study', 'Type', 'Exam') ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat st-comments">
                    <i class="fa fa-building"></i>
                    <div class="info">
                        Total TDs/TPs
                            <span><?php echo total('StudyId', 'study', 'Type', 'Td', 20) ?></span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container latest">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">
                            <i class="fa fa-users"></i> 
                              COURS 
                              <span class="pull-right toggle-info">
                                  <i class="fa fa-plus fa-lg"></i>
                              </span>
                          </div>
                          <div class="panel-body">
                            <ul class="list-unstyled latest-users">
                                <li>1 Année <span class="pull-right"><a href="study.php?do=Manage&level=1&type=cour"><?php echo totalLevel('StudyId', 'study', 'Type', 'Cour', 'Level', 1) ?></a></span></li>
                                <li>2 Année <span class="pull-right"><a href="study.php?do=Manage&level=2&type=cour"><?php echo totalLevel('StudyId', 'study', 'Type', 'Cour', 'Level', 2) ?></a></span></li>
                                <li>3 Année <span class="pull-right"><a href="study.php?do=Manage&level=3&type=cour"><?php echo totalLevel('StudyId', 'study', 'Type', 'Cour', 'Level', 3) ?></a></span></li>
                                <li>4 Année <span class="pull-right"><a href="study.php?do=Manage&level=4&type=cour"><?php echo totalLevel('StudyId', 'study', 'Type', 'Cour', 'Level', 4) ?></a></span></li>
                                <li>5 Année <span class="pull-right"><a href="study.php?do=Manage&level=5&type=cour"><?php echo totallevel('StudyId', 'study', 'Type', 'Cour', 'Level', 5) ?></a></span></li>                                                                                                                                                                                           
                             </ul>
                          </div>
                    </div> 
                </div> 
                <div class="col-sm-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">
                            <i class="fa fa-users"></i> 
                              EXAMS 
                              <span class="pull-right toggle-info">
                                  <i class="fa fa-plus fa-lg"></i>
                              </span>
                          </div>
                          <div class="panel-body">
                            <ul class="list-unstyled latest-users">
                                <li>1 Année <span class="pull-right"><a href="study.php?do=Manage&level=1&type=exam"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', 1) ?></a></span></li>
                                <li>2 Année <span class="pull-right"><a href="study.php?do=Manage&level=2&type=exam"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', 2) ?></a></span></li>
                                <li>3 Année <span class="pull-right"><a href="study.php?do=Manage&level=3&type=exam"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', 3) ?></a></span></li>
                                <li>4 Année <span class="pull-right"><a href="study.php?do=Manage&level=4&type=exam"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', 4) ?></a></span></li>
                                <li>5 Année <span class="pull-right"><a href="study.php?do=Manage&level=5&type=exam"><?php echo totalLevel('StudyId', 'study', 'Type', 'Exam', 'Level', 5) ?></a></span></li>   
                             </ul>
                          </div>
                    </div> 
                </div> 
                <div class="col-sm-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">
                            <i class="fa fa-users"></i> 
                              TDs/TPs
                              <span class="pull-right toggle-info">
                                  <i class="fa fa-plus fa-lg"></i>
                              </span>
                          </div>
                          <div class="panel-body">
                            <ul class="list-unstyled latest-users">
                                <li>1 Année <span class="pull-right"><a href="study.php?do=Manage&level=1&type=td"><?php echo totalLevel('StudyId', 'study', 'Type', 'Td', 'Level', 1) ?></a></span></li>
                                <li>2 Année <span class="pull-right"><a href="study.php?do=Manage&level=2&type=td"><?php echo totalLevel('StudyId', 'study', 'Type', 'Td', 'Level', 2) ?></a></span></li>
                                <li>3 Année <span class="pull-right"><a href="study.php?do=Manage&level=3&type=td"><?php echo totalLevel('StudyId', 'study', 'Type', 'Td', 'Level', 3) ?></a></span></li>
                                <li>4 Année <span class="pull-right"><a href="study.php?do=Manage&level=4&type=td"><?php echo totalLevel('StudyId', 'study', 'Type', 'Td', 'Level', 4) ?></a></span></li>
                                <li>5 Année <span class="pull-right"><a href="study.php?do=Manage&level=5&type=td"><?php echo totalLevel('StudyId', 'study', 'Type', 'Td', 'Level', 5) ?></a></span></li>   
                             </ul>
                          </div>
                    </div> 
                </div>                                   
            </div>
        </div>                    
                   
            <?php
        if ($do == "Manage"){  // Manage Study Page 

            // Select All
            $stmt = $con->prepare("SELECT *
                                   FROM
                                        study 
                                   WHERE 
                                        Level = $level
                                   AND 
                                        Type = '$type'
                                   ORDER BY StudyId ASC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $rows = $stmt->fetchAll();
            if (! empty($rows)){
            ?>

            <div class="container">
              <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                  <tr>
                    <td>#ID</td>                       
                    <td>#Name</td>
                    <td>#Description</td>                       
                    <td>#Year</td>
                    <td>#File</td>
                    <td>#Date</td>
                    <td>#Control</td>
                  </tr>
                  <?php 
                             foreach ($rows as $row) {
                              echo "<tr>";
                                 echo "<td>" . '#'. substr($row['Type'], 0, 5) . '-' .$row['StudyId'] . '_L-' . $row['Level'] . '_M-'. substr($row['Module'], 0, 4) .  "</td>";
                                 echo "<td>" . $row['Name'] . "</td>";
                                 echo "<td>" . $row['Description'] . "</td>";
                                 echo "<td>" . $row['Year'] . "</td>";                                
                                 echo "<td>" . $row['File'] . "</td>";
                                 echo "<td>" . $row['Date'] . "</td>";
                                 echo "<td>
                                        <a href='study.php?do=Edit&fileid=". $row['StudyId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                        <a href='study.php?do=Delete&fileid=". $row['StudyId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                 echo  "</td>";
                              echo "<tr>";  
                             }
                  ?>              
                </table>
              </div>
              <a href='study.php?do=Add&type=<?php echo $type ?>' class="btn btn-primary"><i class="fa fa-plus"></i> Add New File</a>
            </div>
         <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No File to Show</div>"; ?>
                 <a href='study.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New File</a>
                <?php             
               echo "</div>"; 
            }?>
       <?php }elseif ($do == "Add"){ //Add New Students ?>

          <div class="container">
                 <h1 class="text-center">Add New File</h1>
              <form class="form-horizontal form-center" action="?do=Insert" method="POST" enctype="multipart/form-data">
                        <!-- Start Name Filed -->
                      <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10 col-md-4">
                          <input 
                               type="text" 
                               name="name" 
                               class="form-control" 
                               autocomplete="off" 
                               required="required" 
                               placeholder="Name">
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
                                placeholder="Description" >
                        </div>
                      </div>
                        <!-- Start Level Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="level" class="form-control choose"> 
                                   <option value="0">...</option>
                                   <option value="1 Année" data-class='.level1'>1 Année</option>
                                   <option value="2 Année" data-class='.level2'>2 Année</option>
                                   <option value="3 Année" data-class='.level3'>3 Année</option>
                                   <option value="3 Année" data-class='.level4'>4 Année</option>
                                   <option value="4 Année" data-class='.level5'>5 Année</option>          
                                </select> 
                            </div>
                        </div>                        
                        <!-- Start Module Level  1 Field -->
                        <div class="form-group form-group-lg level1" style="display: none;">
                            <label class="col-sm-2 control-label">Module</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control">
                                   <option value="Analyse">Analyse</option>
                                   <option value="Algebre">Algebre</option>
                                   <option value="System d'Expoitation">System d'Expoitation</option> 
                                   <option value="Architecture">Architecture</option>
                                   <option value="Electricité">Electricité</option>
                                   <option value="Algorithme">Algorithme</option> 
                                   <option value="Electrinque">Electronique</option>
                                   <option value="Electrinque">Mecanique</option>
                                   <option value="Assembleur">Assembleur</option>
                                   <option value="TEO1">TEO</option>
                                   <option value="TEE">TEE</option>                   
                                   <option value="Anglais">Anglais</option>                          
                                </select>
                            </div>
                        </div>
                        <!-- Start Module Level  1 Field -->
                        <div class="form-group form-group-lg level2" style="display: none;">
                            <label class="col-sm-2 control-label">Module</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control">
                                   <option value="Analyse">Analyse</option>
                                   <option value="Algebre1">Algebre</option>
                                   <option value="Logique Mathématique">Logique Math</option> 
                                   <option value="Probabilité">Probabilité</option>
                                   <option value="SFD">SFD</option>
                                   <option value="Orienté Object">Orienté Object</option> 
                                   <option value="Optique">Optique</option>
                                   <option value="System d'information">System d'information</option>
                                   <option value="Architecture">Architecture</option>
                                   <option value="Architecture">Electronique</option>
                                   <option value="Architecture">ISI</option>                                    
                                   <option value="Anglais">Anglais</option>                                                                                                     
                                </select>
                            </div>
                        </div>     
                        <!-- Start Module Level  1 Field -->
                        <div class="form-group form-group-lg level3" style="display: none;">
                            <label class="col-sm-2 control-label">Module</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control">
                                   <option value="Analyse">Analyse</option>
                                   <option value="Algebre1">Algebre</option>
                                   <option value="Logique Mathématique">Logique Mathématique</option> 
                                   <option value="Probabilité">Probabilité</option>
                                   <option value="SFD">SFD</option>
                                   <option value="Orienté Object">Orienté Object</option> 
                                   <option value="Optique">Optique</option>
                                   <option value="System d'information">System d'information</option>
                                   <option value="Architecture">Architecture</option>
                                   <option value="Anglais">Anglais</option>                                                                                                         
                                </select>
                            </div>
                        </div>  
                        <!-- Start Type Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="type" class="form-control">
                                   <option value="0">...</option>
                                   <option value="Cour">Cour</option>
                                   <option value="Exam">Exam</option>
                                   <option value="Td">TD / TP</option> 
                                </select>
                            </div>
                        </div>                                         
                        <!-- Start Year Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text"
                                    name="year" 
                                    class="form-control" 
                                    placeholder="20xx/20xx" 
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
                                    id='file'
                                    required="required">
                            </div>
                        </div>  
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">                                                                  
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                          <div class="col-md-offset-2 col-sm-10">
                             <input 
                                    type="submit" 
                                    name="Add" 
                                    value="Upload" 
                                    id='upoad'
                                    class="btn btn-primary">
                          </div>
                        </div>
                   </form>
            </div>     
            <?php }elseif($do == "Insert"){

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert File</h1>";
            echo "<div class='container'>";
              // Get var from the form
              $name            = $_POST["name"];
              $desc            = $_POST["description"];
              $level           = $_POST["level"];
              $module          = $_POST["select"];
              $type            = $_POST['type']; 
              $year            = $_POST['year']; 
              $tmp_name        = $_FILES['file']['name'];
              $destina         = "files/" . $tmp_name;
              move_uploaded_file($_FILES['file']['tmp_name'], $destina);

              // Validate The form
                
                $formError = array();
                if (strlen($name) < 3 ){
                  $formError[] = "Name can't be less than <strong>3 characters</strong>";
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
                            study(Name, Description, Type, Level, Module, Year, File,  Date) VALUES(:zname, :zdesc, :ztype, :zlevel, :zmodule, :zyear,  :zfile, now() )");
                        $stmt->execute(array(
                               'zname'        => $name,
                               'zdesc'        => $desc,
                               'ztype'        => $type,
                               'zlevel'       => $level,
                               'zmodule'      => $module,
                               'zyear'        => $year,
                               "zfile"        => $destina
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>File Inserted</div>";
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
            $fileid =  (isset($_GET['fileid']) && is_numeric($_GET['fileid'])) ? intval($_GET['fileid']) : 0;  

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM study WHERE StudyId=? LIMIT 1");            

            // Execute query
        $stmt->execute(array($fileid));

        // Fetch the data
          $row = $stmt->Fetch();

          // The Row Count 
        $count = $stmt->rowCount();

        // If there's such id show the form
        if ($count > 0 ){ ?>

          <div class="container">
              <h1 class="text-center">Edit File</h1>
            <form class="form-horizontal form-center" action="?do=Update" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="fileid" value="<?php echo $fileid ?>">
                  <!-- Start Name Filed -->
                  <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10 col-md-4">
                      <input 
                              type="text" 
                              name="name" 
                              class="form-control" 
                              autocomplete="off" 
                              placeholder="Name"
                              value="<?php echo $row['Name'] ?>" >
                    </div>
                  </div>
                    <!-- Start first name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="description" 
                                class="form-control"
                                placeholder="Description"
                                value="<?php echo $row['Description'] ?>">
                        </div>
                    </div>
                    <!-- Start level Filed -->
                    <div class="form-group form-group-lg">
                         <label class="col-sm-2 control-label">Level</label>
                         <div class="col-sm-10 col-md-4">
                            <select name="level" class="form-control">  
                                 <option value="1 Année"<?php if($row['Level'] == '1 Année'){
                                    echo 'selected';}?>>1 Année</option>
                                 <option value="2 Année"<?php if($row['Level'] == '2 Année'){
                                    echo 'selected';}?>>2 Année</option>
                                 <option value="3 Année"<?php if($row['Level'] == '3 Année'){
                                    echo 'selected';}?>>3 Année</option>
                                 <option value="4 Année"<?php if($row['Level'] == '4 Année'){
                                    echo 'selected';}?>>4 Année</option>
                                 <option value="5 Année"<?php if($row['Level'] == '5 Année'){
                                    echo 'selected';}?>>5 Année</option>                                                                                                                                                          
                            </select>
                        </div>
                    </div>                                        
                    <!-- Start Type Filed -->
                    <div class="form-group form-group-lg">
                         <label class="col-sm-2 control-label">Type</label>
                         <div class="col-sm-10 col-md-4">
                            <select name="type" class="form-control">   
                                 <option value="Cour"<?php if($row['Type'] == 'Cour')
                                    echo 'selected';?>>Cour</option>          
                                 <option value="Exam"<?php if($row['Type'] == 'Exam')
                                    echo 'selected';?>>Exam</option>
                                 <option value="TD"<?php if($row['Type'] == 'TD')
                                    echo 'selected';?>>TDs</option>
                            </select> 
                        </div>
                    </div> 
                    <!-- Start Year  Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Year</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="year" 
                                class="form-control"
                                placeholder="20xx/20xx"
                                value="<?php echo $row['Year'] ?>">
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
                                id='file'
                                required="required">
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
           echo '<h1 class="text-center">Edit File</h1>';
           echo "<div class='container'>";
            $theMsg = "<div class='alert alert-danger'>Theres No Such ID</div>";
          redirectHome($theMsg);
            echo "</div>";
         }
       }elseif ($do == "Update") {  // Update Page
            echo "<h1 class='text-center'>Update Member</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
                $id            = $_POST['fileid'];
                $name          = $_POST['name'];
                $desc          = $_POST["description"];
                $level         = $_POST["level"];
                $type          = $_POST["type"];
                $year          = $_POST["year"];
                $tmp_name      = $_FILES['f']['name'];
                $destina       = "files/" . $tmp_name;
                move_uploaded_file($_FILES['f']['tmp_name'], $destina);                
              

              // Validate The form
                
                $formError = array();
                if (strlen($name) < 3 ){
                    $formError[] = "Name can't be less than <strong>3 characters</strong>";
                }
                if (strlen($name) > 30 ){
                    $formError[] = "Name can't be more than <strong>20 characters</strong>";
                  }   
                if (strlen($year) < 3  ){
                    $formError[] = "Year can't be more than <strong>20 characters</strong>";
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
                
                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE study SET Name=?, Description=?, Level=?, Type=?, Year=?, File=? WHERE StudyId=?");
                $stmt->execute(array($name, $desc, $level, $type, $year, $destina, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>File Updated</div>";
                    redirectHome($theMsg, "back");
                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete File Page

            echo "<h1 class='text-center'>Delete File</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $fileid =  (isset($_GET['fileid']) && is_numeric($_GET['fileid'])) ? intval($_GET['fileid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('StudyId', 'study', $fileid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM study WHERE StudyId = :zfile");
               $stmt->bindParam(":zfile", $fileid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check File Deleted</div>"; 
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