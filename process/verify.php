<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'connect.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $_GET['email']; 
    $hash = $_GET['hash']; 
    
    // Select user with matching email and hash, who hasn't verified their account yet (active = 0)
    $stmt = $con->prepare("SELECT * FROM users WHERE Email=? AND Hash=? AND RegStatus='0'");
    $stmt->execute(array($email,$hash));

            // Assign to variables
    $rows = $stmt->fetch();
     
      
    if ($stmt->rowCount() == '0'){
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";
        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        
        // Set the user status to active (active = 1)
        $stmt = $con->prepare("UPDATE users SET RegStatus =1 WHERE Email= ?");
        $stmt->execute(array($email));
        $_SESSION['active'] = 1;
        $root = '../monespace.php';
        header("location:". $root);
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}     
?>