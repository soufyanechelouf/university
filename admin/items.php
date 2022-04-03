<?php

      /*=======================================================
      ==== Items Manage Page
      ==== You Can Add \ Edit | Delete Items from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Items";
    if (isset($_SESSION['Username'])){

      include "init.php";

       $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

       if ($do == "Manage"){  // Manage Item Page 
             
            // Select All users except Admin
            $stmt = $con->prepare("SELECT items.*,
                                           categories.Name AS categoryName, 
                                           users.Username 
                                   FROM
                                           items 
                                   INNER JOIN categories ON categories.Id = items.CatId
                                   INNER JOIN users ON users.UserId = items.UserId
                                   ORDER BY ItemId");

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $items = $stmt->fetchAll();
            if (! empty($items)){
            ?>
            <div class="container">
                <h1 class="text-center">Manage Items</h1>
                <div class="table-responsive">
                    <table class="main-table text-center table table-bordered">
                        <tr>
                            <td>#ID</td>
                            <td>#Name</td>
                            <td>#Description</td>
                            <td>#Price</td>
                            <td>#Adding Date</td>
                            <td>Category</td>
                            <td>Username</td>
                            <td>#Control</td>
                        </tr>
                        <?php 
                             foreach ($items as $item) {
                                echo "<tr>";
                                   echo "<td>" . $item['ItemId'] . "</td>";
                                   echo "<td>" . $item['Name'] . "</td>";
                                   echo "<td>" . $item['Description'] . "</td>";
                                   echo "<td>" . $item['Price'] . "</td>";
                                   echo "<td>" . $item['AddDate']. "</td>";
                                   echo "<td>" . $item['categoryName']. "</td>";
                                   echo "<td>" . $item['Username']. "</td>";
                                   echo "<td>
                                          <a href='items.php?do=Edit&itemid=". $item['ItemId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                          <a href='items.php?do=Delete&itemid=". $item['ItemId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                      
                                      if ($item['Approve'] == 0){
                                            echo    "<a href='items.php?do=Approve&itemid=". $item['ItemId'] . "' class='btn btn-info activate'><i class='fa fa-check'></i> Approve</a>";
                                          }
                                    echo "</td>";                                         
                                echo "<tr>";  
                             }
                        ?>                  
                    </table>
                </div>
                <a href='items.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Item</a>
            </div>
             <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No items to Show</div>";
                 echo "<a href='items.php?do=Add' class='btn btn-primary'><i class='fa fa-plus'></i> Add New Item</a>";
               echo "</div>";  
            }?>
            
    <?php   }elseif ($do == "Add"){// Add New Item ?> 
                 <div class="container">
                    <h1 class="text-center">Add New Item</h1>
                    <form class="form-horizontal form-center" action="?do=Insert" method="POST">
 
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control" 
                                    required="required" 
                                    placeholder="Name of the Item">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="description"
                                   class="form-control" autocomplete="off" 
                                   required="required" placeholder="Description of the Item">
                            </div>
                        </div>

                        <!-- Start Price Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="price"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required"
                                   placeholder="Price of the Item">
                            </div>
                        </div>

                        <!-- Start Contry Made Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Country of Made</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="country"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required" 
                                   placeholder="Country of the Item">
                            </div>
                        </div>   


                        <!-- Start Status Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="status" class="form-control">
                                    <option value="0">...</option>   
                                    <option value="1">New</option>
                                    <option value="2">Like New</option>
                                    <option value="3">Used</option>
                                    <option value="4">Old</option> 
                                    <option value="5">Very Old</option>           
                                </select> 
                            </div>
                        </div> 

                        <!-- Start Users Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Users</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="users" class="form-control">
                                    <option value="0">...</option>   
                                    <?php
                                       $stmt = $con->prepare("SELECT * FROM users");
                                       $stmt->execute();
                                       $users = $stmt->fetchAll();
                                       foreach ($users as $user) {
                                           echo "<option value='". $user['UserId'] ."'>". $user['Username'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div>

                        <!-- Start categories Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="cats" class="form-control">
                                    <option value="0">...</option>   
                                    <?php
                                       $stmt1 = $con->prepare("SELECT * FROM categories");
                                       $stmt1->execute();
                                       $cats = $stmt1->fetchAll();
                                       foreach ($cats as $cat) {
                                           echo "<option value='". $cat['Id'] ."'>". $cat['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div>                        
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Add Item" value="Add Item" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>
                </div>           
	 
      <?php }elseif($do == "Insert"){

          if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert Items</h1>";
            echo "<div class='container'>";
                // Get var from the form
                $name     = $_POST["name"];
                $desc     = $_POST["description"];
                $price    = $_POST["price"];
                $country  = $_POST["country"];
                $status   = $_POST["status"];
                $cat      = $_POST["cats"];
                $user     = $_POST["users"];                                                
                
                // Validate The form
                
                $formError = array();
                if (empty($name)){
                    $formError[] = "Name can't be<strong> Empty</strong>";
                }
                if (empty($desc)){
                    $formError[] = "Description can't be<strong> Empty</strong>";
                }
                if (empty($price)){
                    $formError[] = "Price can't be<strong> Empty</strong>";
                }
                if (empty($country)){
                    $formError[] = "Country Made can't be<strong> Empty</strong>";
                }
                if ($status == 0){
                    $formError[] = "Status can't be <strong>Empty</strong>";
                }
                if ($user == 0){
                    $formError[] = "User can't be <strong>Empty</strong>";
                }
                if ($cat == 0){
                    $formError[] = "Categorie can't be <strong>Empty</strong>";
                }                                
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){
                    
                        // Insert Item info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            items(Name, Description, Price, CountryMade, Status,CatId, UserId, AddDate) VALUES(:zname, :zdesc, :zprice, :zcountry, :zstatus, :zcat, :zuser, now()) ");
                        $stmt->execute(array(
                               'zname'     => $name,
                               'zdesc'     => $desc,
                               'zprice'    => $price,
                               'zcountry'  => $country,
                               'zstatus'   => $status,
                               'zcat'      => $cat,
                               'zuser'     => $user                                                            
                                                            
                            ));

                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Record Inserted</div>";
                        redirectHome($theMsg, "back", 5);
                }
            }else{
                    echo '<h1 class="text-center">Add New  Member</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg);
                    echo "<div>";
            }
            echo "</div>";
      

       }elseif ($do == "Edit") { // Edit Page 

        // Check if get request userid is numeric & get the  integer value  of It
        $itemid =  (isset($_GET['itemid']) && is_numeric($_GET['itemid'])) ? intval($_GET['itemid']) : 0; 

        // Select all data depend on thisID 
        $stmt = $con->prepare("SELECT * FROM items WHERE ItemId=?");

        // Execute query
        $stmt->execute(array($itemid));

        // Fetch the data
        $item = $stmt->Fetch();

        // The Row Count 
        $count = $stmt->rowCount();

        // If there's such id show the form
        if ($count > 0 ){ ?>

           <div class="container">
                    <h1 class="text-center">Edit Item</h1>
                    <form class="form-horizontal form-center" action="?do=Update" method="POST">
                        <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
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
                                    value="<?php echo $item['Name'] ?>">
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
                                   value="<?php echo $item['Description'] ?>"
                                   required="required" 
                                   placeholder="Description of the Item">
                            </div>
                        </div>

                        <!-- Start Price Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="price"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required" 
                                   value="<?php echo $item['Price'] ?>"
                                   placeholder="Price of the Item">
                            </div>
                        </div>

                        <!-- Start Contry Made Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Country of Made</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                   type="text" 
                                   name="country"
                                   class="form-control" 
                                   autocomplete="off" 
                                   required="required"
                                   value="<?php echo $item['CountryMade'] ?>" 
                                   placeholder="Country of the Item">
                            </div>
                        </div>   


                        <!-- Start Status Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="status" class="form-control">
                                    <option value="0">...</option>   
                                    <option value="1" <?php if($item['Status'] == 1){
                                      echo 'selected';}?>>New</option>
                                    <option value="2" <?php if($item['Status'] == 2){
                                      echo 'selected';} ?>>Like New</option>
                                    <option value="3" <?php if($item['Status'] == 3){
                                      echo 'selected';}?>>Used</option>
                                    <option value="4" <?php if($item['Status'] == 4){
                                      echo 'selected';}?>>Old</option> 
                                    <option value="5" <?php if($item['Status'] == 5){
                                      echo 'selected';}?>>Very Old</option>           
                                </select> 
                            </div>
                        </div> 

                        <!-- Start Users Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Users</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="users" class="form-control">
                                    <option value="0">...</option>   
                                    <?php
                                       $stmt = $con->prepare("SELECT * FROM users");
                                       $stmt->execute();
                                       $users = $stmt->fetchAll();
                                       foreach ($users as $user) {
                                       echo "<option value='". $user['UserId'] ."'"; if($item['UserID'] == $user['UserId']){
                                      echo 'selected';} 
                                      echo ">". $user['Username'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div>

                        <!-- Start categories Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-10 col-md-4">
                                <select name="cats" class="form-control">
                                    <option value="0">...</option>   
                                    <?php
                                       $stmt1 = $con->prepare("SELECT * FROM categories");
                                       $stmt1->execute();
                                       $cats = $stmt1->fetchAll();
                                       foreach ($cats as $cat) {
                                       echo "<option value='". $cat['Id'] ."'"; 
                                       if($item['CatId'] == $cat['Id']){
                                      echo 'selected';} 
                                      echo ">". $cat['Name'] ."</option>";
                                       }
                                    ?>          
                                </select> 
                            </div>
                        </div>                        
                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Edit Item" value="Add Item" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>
                  <?php 
                  $stmt = $con->prepare("SELECT 
                                              comments.*,users.Username AS Username
                                         FROM 
                                              comments
                                         INNER JOIN
                                              users
                                         ON
                                              users.UserId = comments.UserId
                                         WHERE 
                                              ItemId=$itemid");

                  // Execute the Statements
                  $stmt->execute(array($itemid));

                  // Assign to variables
                  $rows = $stmt->fetchAll();

                  if (! empty($rows)){
                  ?>

                    <h1 class="text-center">Manage [<?php echo $item['Name'] ?>] Comments</h1>
                    <div class="table-responsive">
                      <table class="main-table text-center table table-bordered">
                        <tr>
                          <td>#Comment</td>
                          <td>#Addig By</td>
                          <td>#Adding Date</td>
                          <td>#Control</td>
                        </tr>
                        <?php 
                                   foreach ($rows as $row) {
                                    echo "<tr>";

                                       echo "<td>" . $row['Comment'] . "</td>";
                                       echo "<td>" . $row['Username'] . "</td>";                  

                                       echo "<td>" . $row['AddDate']. "</td>";
                                       echo "<td>
                                              <a href='comments.php?do=Edit&comid=". $row['CId'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                              <a href='comments.php?do=Delete&comid=". $row['CId'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                                if ($row['Status'] == 0){
                                                  echo    "<a href='comments.php?do=Approve&comid=". $row['CId'] . "' class='btn btn-info activate'><i class='fa fa-check'></i> Approve</a>";
                                                } 
                                          echo  "</td>";
                                    echo "<tr>";  
                                   }
                        ?>              
                      </table>
                    </div> 
                    <?php } ?>                               
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
       }elseif ($do == "Update") {  // Update Item

            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
              $id      = $_POST["itemid"];
              $name    = $_POST["name"];
              $desc    = $_POST["description"];
              $price   = $_POST["price"];
              $country  = $_POST["country"];
              $status  = $_POST["status"];
              $user  = $_POST["users"];
              $cat     = $_POST["cats"];
              

                // Validate The form
                
                $formError = array();
                if (empty($name)){
                    $formError[] = "Name can't be<strong> Empty</strong>";
                }
                if (empty($desc)){
                    $formError[] = "Description can't be<strong> Empty</strong>";
                }
                if (empty($price)){
                    $formError[] = "Price can't be<strong> Empty</strong>";
                }
                if (empty($country)){
                    $formError[] = "Country Made can't be<strong> Empty</strong>";
                }
                if ($status == 0){
                    $formError[] = "Status can't be <strong>Empty</strong>";
                }
                if ($user == 0){
                    $formError[] = "User can't be <strong>Empty</strong>";
                }
                if ($cat == 0){
                    $formError[] = "Categorie can't be <strong>Empty</strong>";
                }                                
                // Loop into Errors array and echo It
                foreach ($formError as $error) {
                    echo "<div class='alert alert-danger'>" . $error . "</div>";
                } 
                //Check if there's no error proced the update
                if (empty($formError)){

                  //Update The Database with this info
                $stmt = $con->prepare("UPDATE items  SET 
                   Name=?,
                   Description=?, 
                   Price=?,
                   CountryMade=?,
                   Status=?,
                   CatId=?,
                   UserID=? 
                   WHERE ItemId=?");
                $stmt->execute(array($name, $desc, $desc,$country, $status, $cat, $user, $id));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Record Updated</div>";
                    redirectHome($theMsg, "back");

                }
            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";      

       }elseif($do == "Delete"){ // Delete Member Page

            echo "<h1 class='text-center'>Delete Item</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $itemid =  (isset($_GET['itemid']) && is_numeric($_GET['itemid'])) ? intval($_GET['itemid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('ItemId', 'items', $itemid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM items WHERE ItemId= :zitem");
               $stmt->bindParam(":zitem", $itemid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Record Deleted</div>"; 
                redirectHome($theMsg,"bacl");
        }else{
          $theMsg =  "<div class='alert alert-danger'>this #ID is not Exist</div>";
                redirectHome($theMsg);
        } 
        echo "</div>";         
       }elseif ($do == "Approve"){ // Approve Item Page
                            echo "<h1 class='text-center'>Approve Item</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $itemid =  (isset($_GET['itemid']) && is_numeric($_GET['itemid'])) ? intval($_GET['itemid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('ItemId', 'items', $itemid);

            // If there's such id show the form
            if ($check  > 0 ){ 
               $stmt = $con->prepare("UPDATE items SET Approve =1 WHERE ItemId= ?");
               $stmt->execute(array($itemid));

               // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>$check Record Approved</div>"; 
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