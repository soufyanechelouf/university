<?php

      /*=======================================================
      ==== Manage Comment Page
      ==== You Can  Edit | Delete | Approve Comments from Here
      =======================================================*/
      
    ob_start();
    session_start();
    $pageTitle = "Comments";
    if (isset($_SESSION['Username'])){
      include "init.php";
        $do = isset($_GET["do"]) ? $_GET["do"] : "Manage";

        if ($do == "Manage"){  // Manage Members Page 
            

            $stmt = $con->prepare("SELECT 
                                        comments.*,items.Name AS ItemName,
                                                  users.Username AS Username
                                   FROM 
                                        comments
                                   INNER JOIN 
                                        items 
                                   ON 
                                        items.ItemId = comments.ItemId
                                   INNER JOIN
                                        users
                                   ON
                                        users.UserId = comments.UserId
                                    ORDER BY 
                                         AddDate DESC" );

            // Execute the Statements
            $stmt->execute();

            // Assign to variables
            $rows = $stmt->fetchAll();
            if (! empty($rows)){
            ?>
            <div class="container">
              <h1 class="text-center">Manage Comments</h1>
              <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                  <tr>
                    <td>#CId</td>
                    <td>#Comment</td>
                    <td>#Addig By</td>
                    <td>#In</td>
                    <td>#Adding Date</td>
                    <td>#Control</td>
                  </tr>
                  <?php 
                             foreach ($rows as $row) {
                              echo "<tr>";
                                 echo "<td>" . $row['CId'] . "</td>";
                                 echo "<td>" . $row['Comment'] . "</td>";
                                 echo "<td>" . $row['Username'] . "</td>";                                 
                                 echo "<td>" . $row['ItemName'] . "</td>";

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
            </div>
            <?php } else{
               echo "<div class='container'>";
                 echo "<div class='nice-message'>There\ s No Comments to Show</div>";
               echo "</div>"; 
            }?>
       <?php }elseif ($do == "Edit") { // Edit Page 

            // Check if get request userid is numeric & get the  integer value  of It
            $comid =  (isset($_GET['comid']) && is_numeric($_GET['comid'])) ? intval($_GET['comid']) : 0; 

            // Select all data depend on thisID 
            $stmt = $con->prepare("SELECT * FROM comments WHERE CId=?");

            // Execute query
        $stmt->execute(array($comid));

        // Fetch the data
        $row = $stmt->Fetch();

        // The Row Count 
        $count = $stmt->rowCount();

        // If there's such id show the form
        if ($count > 0 ){ ?>

          <div class="container">
              <h1 class="text-center">Edit Comment</h1>
            <form class="form-horizontal form-center" action="?do=Update" method="POST">
                <input type="hidden" name="comid" value="<?php echo $comid ?>">
                <!-- Start Comment Filed -->
              <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10 col-md-4">
                    <textarea class="form-control" name="comment">
                      <?php  echo $row['Comment'] ?>
                    </textarea>
                </div>
              </div>
              <!-- Start Submit Filed -->
              <div class="form-group form-group-lg">
                <div class="col-md-offset-2 col-sm-10">
                  <input type="submit" name="Save" value="Save" class="btn btn-primary">
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
       }elseif ($do == "Update") {  // Update Commetn Page
            echo "<h1 class='text-center'>Update Comment</h1>";
            echo "<div class='container'>";
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

              // Get var from the form
              $comid     = $_POST["comid"];
              $comment   = $_POST["comment"];              

                //Update The Database with this info
                $stmt = $con->prepare("UPDATE comments SET  Comment=? WHERE CId=?");
                $stmt->execute(array($comment ,$comid));

                // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>Record Updated</div>";
                    redirectHome($theMsg, "back");

            }else{
              $theMsg = "<div class='alert alert-danger'>You can't browse this page directly</div>";
                redirectHome($theMsg);
            }
            echo "</div>";

       }elseif($do == "Delete"){ // Delete Comment Page

            echo "<h1 class='text-center'>Delete Comment</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $comid =  (isset($_GET['comid']) && is_numeric($_GET['comid'])) ? intval($_GET['comid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('CId', 'comments', $comid);

        // If there's such id show the form
        if ($check  > 0 ){ 
               $stmt = $con->prepare("DELETE FROM comments WHERE CId= :zid");
               $stmt->bindParam(":zid", $comid);
               $stmt->execute();

               // Echo Success Message
              $theMsg =  "<div class='alert alert-success'>$check Record Deleted</div>"; 
                redirectHome($theMsg);
        }else{
          $theMsg =  "<div class='alert alert-danger'>this #ID is not Exist</div>";
                redirectHome($theMsg);
        } 
        echo "</div>";   
       }elseif ($do == "Approve"){ // Approve Comment Page
                            echo "<h1 class='text-center'>Approve Comment</h1>";
            echo "<div class='container'>";
            // Check if get request userid is numeric & get the  integer value  of It
            $comid =  (isset($_GET['comid']) && is_numeric($_GET['comid'])) ? intval($_GET['comid']) : 0; 

            // Select all data depend on thisID 

            $check = checkItem('CId', 'comments', $comid);

            // If there's such id show the form
            if ($check  > 0 ){ 
               $stmt = $con->prepare("UPDATE comments SET Status =1 WHERE CId= ?");
               $stmt->execute(array($comid));

               // Echo Success Message
                $theMsg =  "<div class='alert alert-success'>$check Comment Approved</div>"; 
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