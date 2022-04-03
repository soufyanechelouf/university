 <?php

      /*=======================================================
      ==== Categoeris Page
      ==== You Can Add \ Edit | Delete Categories from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Categories";
    if (isset($_SESSION['Username'])){
    	include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

        if ($do == "Manage"){
            $sort = "ASC";
            $sort_array = array("ASC", "DESC");
            if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)){
                $sort = $_GET['sort'];
            } 
            $stmt2 = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");
            $stmt2->execute();
            $cats = $stmt2->fetchAll();
            if (! empty($cats)){
             ?>
            <div class="container categories">
                <h1 class="text-center">  Manage Categories</h1>
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-edit"></i> Manage Categorie
                        <div class="ordering pull-right">
                            <i class="fa fa-sort"></i> Ordering : 
                            <a class="<?php if($sort == 'ASC'){echo 'active';} ?>" href="?sort=ASD">[ Asc |</a>
                            <a class="<?php if($sort == 'DESC'){echo 'active';} ?>" href="?sort=DESC">Desc ]</a>
                           <i class="fa fa-view"></i> View: <span class="active" data-view="full">[ Full</span>
                            <span data-view="classic">Classic ]</span>
                        </div>
                    </div> 
                    <div class="panel-body">
                        <?php
                        foreach ($cats as $cat) {
                            echo "<div class='cat'>";
                            echo "<div class='hidden-btn'>";
                                echo "<a href='categories.php?do=Edit&catid= ". $cat['Id'] ."' class='btn btn-xs btn-primary'><i class='fa fa-edit'></i> Edit</a>";
                                echo "<a href='categories.php?do=Delete&catid= ". $cat['Id'] ."' class='btn btn-xs btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                            echo "</div>";                             
                            echo "<h3>" . $cat['Name'] . "</h3>";
                            echo "<div class='full-view'>";
                              echo "<p>"; if ($cat['Description'] == ""){echo "This Is Empty";}else{echo $cat['Description'];} echo "</p>";
                              if($cat['Visibility'] == 0){echo "<span class='visible'><i class='fa fa-eye'></i> Hidden</span>";}
                              if($cat['AllowComment'] == 0){echo "<span class='comment'><i class='fa fa-close'></i> Comment Disabled</span>";} 
                              if($cat['AllowAds'] == 0){echo "<span class='ads'><i class='fa fa-close'></i> Ads Disabled</span>";}   
                            echo "</div>";
                            echo "</div>";
                            echo "<hr>";
                        }
                        ?>
                    </div>                   
                </div>
                <a href="categories.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Categorie</a>
            </div>  
            <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No Categorie to Show</div>";
                 echo '<a href="categories.php?do=Add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Categorie</a>';
               echo "</div>";  
            }?>  
            <?php
        }elseif($do == "Add"){ // Add New Categorie ?> 
            <div class="container">
                    <h1 class="text-center">Add New Categorie</h1>
                    <form class="form-horizontal form-center" action="?do=Insert" method="POST">

                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10 col-md-4">
                                <input type="text" name="name" class="form-control" autocomplete="off" required="required" placeholder="Name of the Categorie">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                  type="text" 
                                  name="description" 
                                  class=" form-control" 
                                  autocomplete="new-password" 
                                  placeholder="Describe The Categorie">
                            </div>
                        </div>

                        <!-- Start Ordeting Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Ordering</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                  type="text" 
                                  name="ordering" 
                                  class="form-control"  
                                  placeholder="To Arrange the Categorie">
                            </div>
                        </div>

                        <!-- Start Visibility Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Visible</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="vis-yes" 
                                     type="radio" 
                                     name="visible" 
                                     value="0" 
                                     checked>
                                   <label for="vis-yes">Yes</label>
                               </div>
                               <div>
                                   <input id="vis-no" type="radio" name="visible" value="1">
                                   <label for="vis-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Allow Commenting Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Allow Commenting</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="com-yes" 
                                     type="radio" 
                                     name="comment" 
                                     value="0" 
                                     checked>
                                   <label for="com-yes">Yes</label>
                               </div>
                               <div>
                                   <input id="com-no" type="radio" name="comment" value="1">
                                   <label for="com-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Allow Ads Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Allow Ads</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="ads-yes" 
                                     type="radio" 
                                     name="ads" 
                                     value="0" 
                                     checked>
                                   <label for="ads-yes">Yes</label>
                               </div>
                               <div>
                                   <input id="ads-no" type="radio" name="ads" value="1">
                                   <label for="ads-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input type="submit" name="Add Categorie" value="Add Categorie" class="btn btn-primary">
                            </div>
                        </div>                             
                    </form>
                </div>     
      <?php  } elseif ($do == "Insert") {
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "<h1 class='text-center'>Insert Categorie</h1>";
            echo "<div class='container'>";
                // Get var from the form
                $name     = $_POST["name"];
                $desc     = $_POST["description"];
                $order    = $_POST["ordering"];
                $visible  = $_POST["visible"];
                $comment  = $_POST["comment"];
                $ads      = $_POST["ads"];              
                
                    
                 // Check if user Exist in Database
                    $check = checkItem("Name", "categories", $name);
                    if ($check == 1){
                        $theMsg = "<div class='alert alert-danger'>Sorry This Categorie is  Exist</div>";
                        redirectHome($theMsg);
                    }else{
                        
                        // Insert Member info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            categories(Name, Description, Ordering, Visibility, AllowComment, AllowAds) VALUES(:zname, :zdesc, :zorder, :zvisible, :zcomment, :zads)");
                        $stmt->execute(array(
                               'zname'      => $name,
                               'zdesc'      => $desc,
                               'zorder'     => $order,
                               'zvisible'   => $visible,
                               'zcomment'   => $comment,
                               'zads'       => $ads
                            ));                        


                        // Echo success Message
                        $theMsg =  "<div class='alert alert-success'>Categorie Inserted</div>";
                        redirectHome($theMsg, "back", 5);
 
                    }
            }else{
                    echo '<h1 class="text-center">Add New  Categorie</h1>';
                    echo "<div class='container'>";
                    $theMsg =  "<div class='alert alert-danger'>You can't browse this page directly</div>";
                    redirectHome($theMsg, "back");
                    echo "<div>";
            }
            echo "</div>"; 
      }elseif($do == "Edit"){
            // Check if get request catid is numeric & get the  integer value  of It
            $catid =  (isset($_GET['catid']) && is_numeric($_GET['catid'])) ? intval($_GET['catid']) : 0; 

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM categories WHERE Id=?");

            // Execute query
            $stmt->execute(array($catid));

            // Fetch the data
            $cat = $stmt->Fetch();

            // The Row Count 
            $count = $stmt->rowCount();

            // If there's such id show the form
            if ($count > 0 ){ ?>
            <div class="container">
                    <h1 class="text-center">Edit Categorie</h1>
                    <form class="form-horizontal form-center" action="?do=Update" method="POST">
                        <input 
                          type="hidden" 
                          name="catid" 
                          value="<?php echo $catid ?>">
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> name</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                  type="text" 
                                  name="name" 
                                  class="form-control"  
                                  required="required" 
                                  value="<?php echo $cat['Name']; ?>">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                  type="text"
                                   name="description" 
                                   class=" form-control"
                                  value="<?php echo $cat['Description']; ?>">
                            </div>
                        </div>

                        <!-- Start Ordeting Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Ordering</label>
                            <div class="col-sm-10 col-md-4">
                                <input 
                                  type="text"
                                  name="ordering"
                                  class="form-control" 
                                  value="<?php echo $cat['Ordering']; ?>">
                            </div>
                        </div>

                        <!-- Start Visibility Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Visible</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="vis-yes" 
                                     type="radio" 
                                     name="visible" 
                                     value="0" <?php if($cat['Visibility'] == 0){echo 'checked';}  ?>>
                                   <label for="vis-yes">Yes</label>
                               </div>
                               <div>
                                   <input 
                                     id="vis-no" 
                                     type="radio" 
                                     name="visible" 
                                     value="1" <?php if($cat['Visibility'] == 1){echo 'checked';}  ?>>
                                   <label for="vis-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Allow Commenting Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Allow Commenting</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="com-yes" 
                                     type="radio" 
                                     name="comment" 
                                     value="0" <?php if($cat['AllowComment'] == 0){echo 'checked';}  ?>>
                                   <label for="com-yes">Yes</label>
                               </div>
                               <div>
                                   <input
                                      id="com-no"
                                      type="radio"
                                      name="comment" 
                                      value="1" <?php if($cat['AllowComment'] == 1){echo 'checked';}  ?>>
                                   <label for="com-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Allow Ads Field -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Allow Ads</label>
                            <div class="col-sm-10 col-md-4">
                               <div>
                                   <input  
                                     id="ads-yes" 
                                     type="radio"
                                     name="ads"
                                     value="0" <?php if($cat['AllowAds'] == 0){echo 'checked';}  ?>>
                                   <label for="ads-yes">Yes</label>
                               </div>
                               <div>
                                   <input 
                                    id="ads-no" 
                                    type="radio"
                                    name="ads"
                                    value="1" <?php if($cat['AllowAds'] == 1){echo 'checked';}  ?>>
                                   <label for="ads-no">No</label>
                               </div>                       
                            </div>
                        </div>

                        <!-- Start Submit Filed -->
                        <div class="form-group form-group-lg">
                            <div class="col-md-offset-2 col-sm-10">
                                <input 
                                  type="submit" 
                                  name="Save Categorie"
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
      }elseif ($do == "Update"){
            echo "<h1 class='text-center'>Update Categorie</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
                $id       = $_POST["catid"];
                $name     = $_POST["name"];
                $desc     = $_POST["description"];
                $order    = $_POST["ordering"];
                $visible  = $_POST["visible"];
                $comment  = $_POST["comment"];
                $ads      = $_POST["ads"]; 
          

                 //Update The Database with this info
                 $stmt = $con->prepare("UPDATE categories
                                        SET 
                                          Name = ?,
                                          Description = ?,
                                          Ordering = ?,
                                          Visibility = ?,
                                          AllowComment = ?,
                                          AllowAds = ?
                                        WHERE
                                          Id = ?");                 
                $stmt->execute(array($name, $desc, $order,$visible, $comment, $ads, $id
                  ));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Record Updated</div>";
                    redirectHome($theMsg, "back");

            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";          
      }elseif ($do == "Delete"){ // Delete Page
            echo "<h1 class='text-center'>Activate Categorie</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $catid =  (isset($_GET['catid']) && is_numeric($_GET['catid'])) ? intval($_GET['catid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('Id', 'categories', $catid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM categories WHERE Id= :zid");
               $stmt->bindParam(":zid", $catid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Record Deleted</div>"; 
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