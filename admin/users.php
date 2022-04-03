<?php

      /*=======================================================
      ==== Manage Members Page
      ==== You Can Add \ Edit | Delete | Approved Members from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Members";
    if (isset($_SESSION["Email"])){
        include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";
        // get Student Level
        $levelid =  (isset($_GET['level']) && is_numeric($_GET['level'])) ? intval($_GET['level']) : 0;
        $groupid =  (isset($_GET['groupid']) && is_numeric($_GET['groupid'])) ? intval($_GET['groupid']) : 0;
        if (isset($_GET['order']))  $order = $_GET['order']; else $order = 'LastName';
        $id = "#USER" . $groupid . '-' . $levelid . '_';
        if ($do == "Manage"){  // Manage Members Page 
            $query = '';          
            if (isset($_GET['page']) && $_GET['page'] == "Pending"){
                $query = 'AND RegStatus = 0';
            }
            // Select All users except Admin
            $stmt = $con->prepare("SELECT users.*,
                                           classes.Name AS Level
                                   FROM
                                           users 
                                   INNER JOIN classes ON classes.ClasseId = users.Level
                                   WHERE Level = $levelid
                                   AND GroupId = $groupid
                                   ORDER BY $order ASC");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $rows = $stmt->fetchAll();
            if (! empty($rows)){
            ?>

            <div class="container">
                 <h1 class="text-center"><?php
                   if ($groupid == 1)
                    echo 'Manage Teachers';
                   else echo 'Manage Students';
                   ?>
                   </h1>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>#ID</td>                       
                            <td><a href="users.php?do=Manage&level=<?php echo $levelid ?>&groupid=<?php echo $groupid ?>&order=Email">#Email</a></td>
                            <td> <a href="users.php?do=Manage&level=<?php echo $levelid ?>&groupid=<?php echo $groupid ?>&order=FirstName">#FirsName</a></td>
                            <td><a href="users.php?do=Manage&level=<?php echo $levelid ?>&groupid=<?php echo $groupid ?>&order=FirstName">#LastName</a></td>
                            <?php if ($groupid == '1'){?>
                            <td>#Teaching</td>
                            <td>#Biography</td>
                            <?php  }else {?>
                            <td>#Level</td> 
                            <?php } ?>                           
                            <td><a href="users.php?do=Manage&level=<?php echo $levelid ?>&groupid=<?php echo $groupid ?>&order=Date">#Registred Date</a></td>
                            <td>#Control</td>
                        </tr>
                        <?php 
                             foreach ($rows as $row) {
                                echo "<tr>";
                                   echo "<td>" . $id . $row['UserId'] . "</td>";
                                   echo "<td>" . $row['Email'] . "</td>";
                                   echo "<td>" . $row['FirstName'] . "</td>";
                                   echo "<td>" . $row['LastName'] . "</td>";
                                   if ($groupid == 1){
                                   echo "<td>" . $row['Level'] . "</td>";
                                   ?> 
                                   <td><a href="biographie.php?do=Manage&teacherid=<?php echo $row['UserId']; ?>" style='color:black'>Show</a></td>
                                   <?php
                                   }else{
                                    echo "<td>". $row['Level'] . "</td>";
                                   }                                 
                                   echo "<td>" . $row['Date'] . "</td>";
                                   echo "<td>
                                          <a href='users.php?do=Edit&userid=". $row['UserId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                          <a href='users.php?do=Delete&userid=". $row['UserId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                          if ($row['RegStatus'] == 0){
                                            echo    "<a href='users.php?do=activate&userid=". $row['UserId'] . "' class='btn btn-info activate'><i class='fa fa-check'></i> Activate</a>";
                                          } 
                                      echo  "</td>";
                                echo "<tr>";  
                             }
                        ?>                  
                    </table>
                </div>
                <a href='users.php?do=Add&groupid=<?php echo $groupid ?>' class="btn btn-primary"><i class="fa fa-plus"></i>
                  <?php
                   if ($groupid == 1)
                    echo 'Add New Teacher';
                   else echo 'Add New Student';
                   ?>
                   <a href='notifacations.php?do=Add' class="btn btn-info" style="margin-left: 20px"><i class="fa fa-plus"></i> Post New Notifications</a>
                 </a>
            </div>
         <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No Users to Show</div>";
                 if ($groupid == 1){?>
                 <a href='users.php?do=Add&groupid=<?php echo $groupid ?>' class='btn btn-primary'><i class='fa fa-plus'></i> Add New Teacher</a>

                 <?php }else{ ?> 
                 <a href='users.php?do=Add&groupid=<?php echo $groupid ?>' class='btn btn-primary'><i class='fa fa-plus'></i> Add New Student</a>
                <?php }             
               echo "</div>"; 
            }?>
       <?php }elseif ($do == "Add"){ //Add New Students ?>

            <div class="container">
                 <h1 class="text-center"><?php
                   if ($groupid == 1)
                    echo 'Add Teachers';
                   else echo 'Add Students';
                   ?>
                   </h1>
                    <form class="form-horizontal form-center" action="?do=Insert" method="POST">

                        <!-- Start Email Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="email" 
                                    class="form-control" 
                                    autocomplete="off" 
                                    required="required" 
                                    placeholder="Email">
                            </div>
                        </div>

                        <!-- Start Password Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="password form-control" 
                                    autocomplete="new-password" 
                                    required="required" 
                                    placeholder="Password">
                                <i class="show-pass fa fa-eye fa-2x"></i>
                            </div>
                        </div>
                        <!-- Start first Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text"
                                    name="firstname" 
                                    class="form-control" 
                                    placeholder="First Name" 
                                    required="required">
                            </div>
                        </div>
                        <!-- Start last Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text"
                                    name="lastname" 
                                    class="form-control" 
                                    placeholder="Last Name" 
                                    required="required">
                            </div>
                        </div>
                        <!-- Start choose Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Add</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="status" class="form-control choose">  
                                    <option value="0">...</option>                                
                                    <option value="1" data-class=".teacher">Teacher</option>
                                    <option value="2" data-class=".student">Student</option>          
                                </select> 
                            </div>
                        </div>   
                        <!-- Start Users Filed -->
                        <div class="form-group form-group-lg student" style="display: none">
                            <label class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control">
                                    <option value="0">...</option>   
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
                            <input type="hidden" name="grade">
                        </div>    
                        <!-- Start Grade Field -->
                        <div class="form-group form-group-lg teacher" style="display: none;">
                            <label class="col-sm-2 control-label">Teaching</label>
                            <div class="col-sm-10 col-md-4">
                                <select  class="form-control">
                                    <option value="0">...</option>   
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
                            <label class="col-sm-2 control-label grade">Grade</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text"
                                    name="grade" 
                                    class="form-control" 
                                    placeholder="Grade" >
                            </div>                                                         
                        </div>                                          
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input 
                                    type="submit" 
                                    name="Add user" 
                                    value="Add user" 
                                    class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>     
            <?php }elseif($do == "Insert"){

            if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert Member</h1>";
            echo "<div class='container'>";
                // Get var from the form
                $email       = $_POST["email"];
                $pass        = $_POST["password"];
                $firstname   = $_POST["firstname"];
                $lastname    = $_POST["lastname"];
                $status      = $_POST['status']; 
                $grade       = $_POST["grade"];
                $level       = $_POST["select"];
                $hashPass    = sha1($_POST["password"]);
                
                // Validate The form
                
                $formError = array();
                if (strlen($firstname) < 3 ){
                    $formError[] = "FirstName can't be less than <strong>3 characters</strong>";
                }
                if (strlen($lastname) < 3 ){
                    $formError[] = "LastName can't be less than <strong>3 characters</strong>";
                }  
                if (strlen($firstname) > 20 ){
                    $formError[] = "FirstName can't be more than <strong>20 characters</strong>";
                }
                if (strlen($lastname) > 20 ){
                    $formError[] = "LastName can't be more than <strong>20 characters</strong>";
                }                               
                if (empty($pass)){
                    $formError[] = "Password can't be <strong>Empty</strong>";
                }
                if (empty($firstname)){
                    $formError[] = "name can't be <strong>Empty</strong>";
                }
                if (empty($lastname)){
                    $formError[] = "name can't be <strong>Empty</strong>";
                }                                              
                if (empty($email)){
                    $formError[] = "Email can't be <strong>Empty</strong>";
                }
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                    
                    // Check if user Exist in Database
                    $check = checkItem("Email", "users", $email);
                    if ($check == 1){
                        $theMsg = "<div class='alert alert-danger'>Sorry This User is Exist</div>";
                        redirectHome($theMsg, "back", 3);
                    }else{
                        // Insert Member info in Database
                         if ($_POST["status"] == '1'){
                               $GroupId      = '1'; 

                         }else {
                                $GroupId     = '2';
                                $grade       = ''; 

                         }
                        $stmt = $con->prepare("INSERT INTO 
                            users(Email, Password, FirstName, LastName, Level, Grade, RegStatus, GroupId,  Date) VALUES(:zmail, :zpass, :zfirstname, :zlastname, :zlevel, :zgrade, 1, $GroupId, now() )");
                        $stmt->execute(array(
                               'zmail'       => $email,
                               'zpass'       => $hashPass,
                               'zfirstname'  => $firstname,
                               'zlastname'   => $lastname,
                               'zlevel'      => $level,
                               'zgrade'      => $grade
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>User Inserted</div>";
                        redirectHome($theMsg, "back", 3);
 
                    }
                }
            }else{
                    echo '<h1 class="text-center">Add New  Member</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";

            } elseif ($do == "Edit") { // Edit Page 

            // Check if get request userid is numeric & get the  integer value  of It
            $userid =  (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0;  

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM users WHERE UserId=? LIMIT 1");            

            // Execute query
            $stmt->execute(array($userid));

            // Fetch the data
            $row = $stmt->Fetch();

            // The Row Count 
            $count = $stmt->rowCount();

            // If there's such id show the form
            if ($count > 0 ){ ?>

            <div class="container">
                <h1 class="text-center">Edit</h1>
                <form class="form-horizontal form-center" action="?do=Update" method="POST">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
                    <!-- Start Email Filed -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                autocomplete="off" 
                                value="<?php echo $row['Email'] ?>" >
                        </div>
                    </div>
                    <!-- Start Password Filed -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="hidden" 
                                name="oldpass" 
                                class="form-control" 
                                value="<?php echo $row['Password'] ?>">
                            <input 
                                type="text" 
                                name="newpass" 
                                class="form-control" 
                                autocomplete="new-password" 
                                placeholder="Leave Blank if you dont want to change">
                        </div>
                    </div>
                    <!-- Start first name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="firstname" 
                                class="form-control"
                                value="<?php echo $row['FirstName'] ?>">
                        </div>
                    </div>
                    <!-- Start Last Name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10 col-md-4">
                            <input 
                                type="text" 
                                name="lastname" 
                                class="form-control"
                                value="<?php echo $row['LastName'] ?>">
                        </div>
                    </div>
                    <input type="hidden" name="year">
                    <input type="hidden" name="grade">

                    <?php  if ($row['GroupId'] == 2){ ?>
                        <!-- Start level Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="year" class="form-control">  
                                    <option value="0"></option> 
                                    <?php
                                       $stmt1 = $con->prepare("SELECT * FROM classes");
                                       $stmt1->execute();
                                       $classes = $stmt1->fetchAll();
                                       foreach ($classes as $classe) {
                                       echo "<option value='". $classe['ClasseId'] ."'"; 
                                       if($classe['ClasseId'] == $row['Level']){
                                      echo 'selected';} 
                                      echo ">". $classe['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div>
                        <input type="hidden" name="grade">
                       
                    <?php } ?>                       
                    <?php  if ($row['GroupId'] == 1){ ?>
                        <!-- Start level Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Teaching</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="year" class="form-control">  
                                    <option value="0"></option> 
                                    <?php
                                       $stmt1 = $con->prepare("SELECT * FROM classes");
                                       $stmt1->execute();
                                       $classes = $stmt1->fetchAll();
                                       foreach ($classes as $classe) {
                                       echo "<option value='". $classe['ClasseId'] ."'"; 
                                       if($classe['ClasseId'] == $row['Level']){
                                      echo 'selected';} 
                                      echo ">". $classe['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div> 
                        <!-- Start teacher Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Grade</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="grade" 
                                    class="form-control"
                                    value="<?php echo $row['Grade'] ?>">
                            </div>
                        </div>                                                
                    <?php } ?>  
                    <?php  if ($row['GroupId'] == 0){ ?>
                        <input type="hidden" name="year">
                        <input type="hidden" name="grade">
                    <?php } ?>                                                         
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
           echo '<h1 class="text-center">Edit Member</h1>';
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
                $id          = $_POST['userid'];
                $email       = $_POST["email"];
                $pass        = $_POST["newpass"];
                $firstname   = $_POST["firstname"];
                $lastname    = $_POST["lastname"];
                $level       = $_POST["year"];
                $grade       = $_POST["grade"];
                
                // Password Trick
                $pass = empty($_POST['newpass']) ? $_POST['oldpass']: sha1($_POST['newpass']);

                // Validate The form
                
                $formError = array();
                if (strlen($firstname) < 3 ){
                    $formError[] = "FirstName can't be less than <strong>3 characters</strong>";
                }
                if (strlen($lastname) < 3 ){
                    $formError[] = "LastName can't be less than <strong>3 characters</strong>";
                }  
                if (strlen($firstname) > 20 ){
                    $formError[] = "FirstName can't be more than <strong>20 characters</strong>";
                }
                if (strlen($lastname) > 20 ){
                    $formError[] = "LastName can't be more than <strong>20 characters</strong>";
                }                               
                if (empty($pass)){
                    $formError[] = "Password can't be <strong>Empty</strong>";
                }
                if (empty($firstname)){
                    $formError[] = "FirstName can't be <strong>Empty</strong>";
                }
                if (empty($lastname)){
                    $formError[] = "LastName can't be <strong>Empty</strong>";
                }                                              
                if (empty($email)){
                    $formError[] = "Email can't be <strong>Empty</strong>";
                }
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){

                    $stmt2 = $con->prepare("SELECT *      FROM 
                                 users 
                              WHERE
                                 Email = ?  
                              AND 
                                 UserId != ?");
                    $stmt2->execute(array($email,$id));
                    $count = $stmt2->rowCount();
                    if ($count == 1){   
                           echo "<div class='container'>";
                           $theMsg = "<div class='alert alert-danger'>Sorry This Username Exist</div>";
                          redirectHome($theMsg,"back");
                          echo "</div>";
                    }else{
                
                    //Update The Database with this info
                    $stmt = $con->prepare("UPDATE users SET Email=?, Password=?, FirstName=?, LastName=?, Level=?, Grade=? WHERE userId=?");
                    $stmt->execute(array($email, $pass, $firstname, $lastname, $level, $grade, $id));

                    // Echo Success Message
                    $theMsg =  "<div class='alert alert-success'>Record Updated</div>";
                    redirectHome($theMsg, "back");
                   }
                }
            }else{
                $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete Member Page

            echo "<h1 class='text-center'>Delete Member</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $userid =  (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('userid', 'users', $userid);

            // If there's such id show the form
            if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM users WHERE UserId= :zuser");
               $stmt->bindParam(":zuser", $userid);
               $stmt->execute();

               // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>$check Record Deleted</div>"; 
                redirectHome($theMsg, "back");
            }else{
                $theMsg =  "<div class='alert alert-danger'>this #ID is not Exist</div>";
                redirectHome($theMsg);
            } 
          echo "</div>";   
       }elseif ($do = "Activate"){ // Activate Members Page
                            echo "<h1 class='text-center'>Active Member</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $userid =  (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('userid', 'users', $userid);

            // If there's such id show the form
            if ($check  > 0 ){ 
               $stmt = $con->prepare("UPDATE users SET RegStatus =1 WHERE UserId= ?");
               $stmt->execute(array($userid));

               // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>$check Record Activated</div>"; 
                redirectHome($theMsg);
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