<?php  
    
    ob_start(); // Output Buffering Start

    session_start();
    if (isset($_SESSION["Email"])){
    	$pageTitle = "Dashboard";
    	include "init.php";
        
       /* Start Dashboard Page */
        $nbrstudent = 5; // Number of latest Users
        $lateststudent = getLatest("*", "users","GroupId", 2, 'Date', $nbrstudent); // Latest Student Array
        $nbrteacher = 5;
        $latestteacher = getLatest("*", "users", "GroupId", 1 , 'Date', $nbrteacher); // Latest Teacher Array

        ?>    
        <div class="container home-stat text-center">
            <h1>Dashboard</h1>
        	<div class="row">
        		<div class="col-md-3">
        			<div class="stat st-members">
                      <i class='fa fa-users'></i>
                      <div class="info">
                        Total Students
                        <span><?php echo total('UserId', 'users', 'GroupId', 2) ?></span>
                      </div>
        			</div>
        		</div>
                <div class="col-md-3">
                    <div class="stat st-comments">
                      <i class='fa fa-graduation-cap'></i>
                      <div class="info">
                        Total Teachers
                        <span><?php echo total('UserId', 'users', 'GroupId', 1) ?></span>
                      </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-items">
                        <i class="fa fa-newspaper-o"></i>
                        <div class="info">
                        Total News
                        <span><?php echo somme('NewsId', 'news') ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat st-pending">
                        <i class="fa fa-user-plus"></i>
                        <div class="info">
                        Total Events
                        <span><?php echo somme('EventId', 'events') ?></span>
                        </div>
                    </div>
                </div>              
        	</div>
        </div>
        <div class="container latest">
        	<div class="row">
        		<div class="col-sm-6">
        			<div class="panel panel-default">
        				  <div class="panel-heading">
        				  	<i class="fa fa-users"></i> 
                              The <?php echo $nbrstudent ?> Latest Student Registred
                              <span class="pull-right toggle-info">
                                  <i class="fa fa-plus fa-lg"></i>
                              </span>
        				  </div>
        				  <div class="panel-body">
                            <ul class="list-unstyled latest-users">
            				   <?php 
                                    if (!empty($lateststudent)){
                                    foreach ($lateststudent as $user ) {
                                            echo "<li>";
                                                echo $user['Email'] . "<span class ='btn btn-success pull-right'>";
                                                echo "<a href='users.php?do=Edit&userid=" . $user['UserId'] . "'>";
                                                    echo "<span class='btn btn-success pull-right'>";
                                                        echo "<i class='fa fa-edit'></i> Edit";
                                                          if ($user['RegStatus'] == 0){
                                                            echo    "<a href='users.php?do=activate&userid=". $user['UserId'] . "' class='btn btn-info pull-right Activate' style='color:white'><i class='fa fa-close'></i> Activate</a>";
                                                          }                                                     
                                                    echo "</span>";
                                                echo "</a>";
                                            echo "</li>";
                                     }
                                   }else{
                                     echo "<div class='nice-message'>There\'s is no Record to Show</div>";
                                   }
                                ?>
                             </ul>
        				  </div>
        			</div>
        		</div>
        		<div class="col-sm-6">
        			<div class="panel panel-default">
        				  <div class="panel-heading">
                            <i class="fa fa-users"></i> 
                              The <?php echo $nbrteacher ?> Latest Teachers Registred
                              <span class="pull-right toggle-info">
                                  <i class="fa fa-plus fa-lg"></i>
                              </span>
        				  </div>
                          <div class="panel-body">
                            <ul class="list-unstyled latest-users">
                               <?php 
                                    if (!empty($latestteacher)){
                                    foreach ($latestteacher as $teacher ) {
                                            echo "<li>";
                                                echo $teacher['Email'] . "<span class ='btn btn-success pull-right'>";
                                                echo "<a href='users.php?do=Edit&userid=" . $teacher['UserId'] . "'>";
                                                    echo "<span class='btn btn-success pull-right'>";
                                                        echo "<i class='fa fa-edit'></i> Edit";
                                                          if ($teacher['RegStatus'] == 0){
                                                            echo    "<a href='users.php?do=activate&userid=". $teacher['UserId'] . "' class='btn btn-info pull-right Activate' style='color:white'><i class='fa fa-close'></i> Activate</a>";
                                                          }                                                     
                                                    echo "</span>";
                                                echo "</a>";
                                            echo "</li>";
                                     }
                                   }else{
                                     echo "<div class='nice-message'>There\'s is no Record to Show</div>";
                                   }
                                ?>
                             </ul>
                          </div>
        			</div>
        		</div>
        	</div>
        </div>
        <?php
        /* End Dashboard Page */
    	include $tpl . "footer.php";
    }else{
    	header("location: index.php");
    	exit();
    }
    ob_end_flush();
?>