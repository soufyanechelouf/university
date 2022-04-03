<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
ob_start();
session_start();
$pageTitle = "Password Reset";
include ("init.php");
// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['Email']) AND isset($_GET['Hash']) && !empty($_GET['Hash']) )
{
    $email = $_GET['email']; 
    $hash = $_GET['hash']; 
     // Make sure user email with matching hash exist
      $stmt = $con->prepare("SELECT * FROM users WHERE Email = :email AND Hash=:hash");
      $stmt->bindparam(':email',$email,PDO::PARAM_STR,30) or die.mysql_error();
	  $stmt->bindparam(':hash',$hash,PDO::PARAM_STR,30) or die.mysql_error();
      $stmt->execute();
      $result = $stmt->fetch();
    if ($stmt->rowCount() ===0 )
    { 
        $_SESSION['message'] = "Vous avez entrer un URL invalide pour password reset!";
        header("location: error.php");
    }
}
/*else {
    $_SESSION['message'] = "Désole , verification echoué, réssayer !";
    header("location: error.php");  
}*/
?>
<section class="signing">        
    <div class="container">
      <div class="row">
                     <div class="col-xs-12 heading">
                            <h2 class="h1 text-center">Bienvenue dans Password Reset zone </h2>
                    </div>
    <div class="form" >

          <h1>Choisi un nouveau mot de passe</h1>
          
          <form action="process/reset_password.php" method="post">
              
          <div class="field-wrap">
            <label>
              Nouveau mot de passe <span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
          </div>
              
          <div class="field-wrap">
            <label>
              Confirmer le mot de passe <span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?php echo $email ?>">    
          <input type="hidden" name="hash" value="<?php echo $hash ?>">    
            
          <button type="submit" name="apply" class="button button-block"/>Appliquer</button>       </form>

    </div>
		</div>
</div>
    </section>
  <?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  