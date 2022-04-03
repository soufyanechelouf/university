<?php  
       session_start();
       $pageTitle = "Create New Add";
       include "init.php";
       if (isset($_SESSION['user'])){


       if ($_SERVER['REQUEST_METHOD'] =='POST'){
               echo $_POST['name'];
               $formErrors = array();
               $name     = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
               $desc     = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
               $price    = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
               $country  = filter_var($_POST['country'],FILTER_SANITIZE_STRING);
               $status   = filter_var($_POST['status'],FILTER_SANITIZE_NUMBER_INT);
               $cat      = filter_var($_POST['cats'],FILTER_SANITIZE_NUMBER_INT);

               if (strlen($name) < 3){
                $formErrors[] = "Title must be larlger than 3 characters";
               }
               if (strlen($desc) < 10){
                $formErrors[] = "Description must be larlger than 10 characters";
               } 
               if (strlen($country) < 2){
                $formErrors[] = "Description must be larlger than 10 characters";
               }   
               if (empty($formError)){
                    
                        // Insert item info in Database
                        $stmt = $con->prepare("INSERT INTO 
                            items(Name, Description, Price, CountryMade, Status,CatId, UserId, AddDate) VALUES(:zname, :zdesc, :zprice, :zcountry, :zstatus, :zcat, :zuser, now()) ");
                        $stmt->execute(array(
                               'zname'     => $name,
                               'zdesc'     => $desc,
                               'zprice'    => $price,
                               'zcountry'  => $country,
                               'zstatus'   => $status,
                               'zcat'      => $cat,
                               'zuser'     => $_SESSION['uid']                                                            
                                                            
                            ));

                        // Echo success Message
                        if ($stmt){
                          $successMsg =  "<div class='alert alert-success'>Item Inserted</div>";
                         
                        }
 
                }                                          
       }
       
?>

       <h1 class="text-center">Create New Add</h1>
       <div class="create-ad block">
          <div class="container">
             <div class="panel panel-primary">
              <div class="panel-heading">
                My Information
              </div>
              <div class="panel-body">  
                  <div class="row">
                     <div class="col-md-8">
                        <form class="form-horizontal main-form form-center" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
 
                        <!-- Start Name Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label"> Name</label>
                            <div class="col-sm-10 col-md-9">
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control live"
                                    required="required" 
                                    data-class=".live-title" 
                                    placeholder="Name of the Item">
                            </div>
                        </div>

                        <!-- Start Description Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10 col-md-9">
                                <input 
                                   type="text" 
                                   name="description"
                                   class="form-control  live" 
                                   autocomplete="off"
                                   data-class=".live-desc" 
                                   required="required" 
                                   placeholder="Description of the Item">
                            </div>
                        </div>

                        <!-- Start Price Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Année</label>
                            <div class="col-sm-10 col-md-9">
                                <input 
                                   type="text" 
                                   name="price"
                                   class="form-control  live" 
                                   autocomplete="off" 
                                   required="required"
                                   data-class='.live-price'
                                   placeholder="entrer l'année">
                            </div>
                        </div>

                        <!-- Start Contry Made Filed
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Country of Made</label>
                            <div class="col-sm-10 col-md-9">
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
                            <div class="col-sm-10 col-md-9">
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

                        <!-- Start categories Filed -->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-10 col-md-9">
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
                     <div class="col-md-4">
                       <div class="thmbnail item-box live-preview">
                         <span class="price-tag">
                             $<span class="live-price"></span>  
                         </span>
                         <img src="images/testim.jpg" class="img-responsive">
                         <div class="caption">
                              <h3 class="live-title">Titel</h3>
                              <p class="live-desc">Description</p>
                         </div>
                       </div>
                     </div>
                 </div>
                 <!-- Start Looping through Erros -->
                <?php 

                if (!empty($formErrors)){
                  foreach ($formErrors as $error) {
                    echo "<div class='alert alert-danger'>" . $error .  "</div>";
                  }
                }
                if (isset($successMsg)){
                      echo "<div class='ms success'>" . $successMsg . "</div>"; 
                 }                
                ?>
                 <!-- End Looping through Erros -->
              </div>
             </div>
          </div>
       </div>
 <?php
   } else{
        header('Location : login.php');
        exit();
   }

       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
   
