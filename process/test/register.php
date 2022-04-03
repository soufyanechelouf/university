<?php
require 'PHPMailer-master/PHPMailerAutoload.php'; 
require "connect.php" ;
ob_start(); // Output Buffering Start
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
if (isset($_POST['register'])) {
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Set session variables to be used on profile.php page
   
$_SESSION['email']     = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname']  = $_POST['lastname'];
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$grade     = $_POST['grade'];
$email     = $_POST['email'] ;
$password  = sha1($_POST['password']);
$hash      = md5( rand(0,1000) );      
$level     = $_POST["select"];
	if ($_POST["status"] == '1'){
                                $GroupId = '1'; 
                         }
	else {
                                $GroupId = '2';
                                $grade = ''; 
	}
    // Check if user with that email already exists
   $stmt = $con->prepare("SELECT * FROM users WHERE Email= :email");
   $stmt->bindparam(':email',$email,PDO::PARAM_STR,30) or die.mysql_error();
	 $stmt->execute();
   $result = $stmt->fetch();// We know user email exists if the rows returned are more than 0
if ( $stmt->rowCount() >0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
}                  
else
{ 
	// Email doesn't already exist in a database, proceed...
     $str0 = explode('.',$email)
    $str1 = explode('@',$email);
    if(strlen($str0[0])==1) && ($str1[1] == 'esi-sba.dz'){
        // to make sure that the user is from esi
        // active is 0 by DEFAULT (no need to include it here)
		  $stmt = $con->prepare("INSERT INTO 
                            users(Email, Password,Hash , FirstName, LastName, Grade,Level,Date ,RegStatus,GroupId) VALUES(:mail, :pass,:hash, :firstname, :lastname,:grade,:level,  now() ,0, $GroupId)");
                        $stmt->execute(array(
                               'mail'       => $email,
                               'pass'       => $password,
				               'hash'       => $hash,
                               'firstname'  => $firstname,
                               'lastname'   => $lastname,
                               'grade'      => $grade,
							   'level'      => $level
                            ));
    // Add user to the database
   if ($stmt->rowCount() >0){
        $_SESSION['active']    = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true;
        $_SESSION['level'] = $_POST['level'];
        $_SESSION['groupid']   = $_POST['status'];
         // So we know the user has logged in
        $_SESSION['message'] =
                 "le lien de confirmation est envoyé à  $email, cvp verifier votre compte !";
// Send registration confirmation link (verify.php)
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'nadirbelmath@gmail.com';
$mail->Password = 'nadirbel01';
$mail->setFrom('nadirbelmath@gmail.com');
$mail->addAddress($email);
$mail->Subject = 'Message de verification';
$mail->Body = 'Bonjour  '.$firstname.
    ' ,  merci pour votre registration !
        cvp cliquer sur le lien ci-dessous pour affirmer votre email de registration : 
         http://localhost/ESI_SBA/process/verify.php?email='.$email.'&hash='.$hash;  
//send the message, check for errors
if ($mail->send()) {
        header("location: monespace.php ");
         } 
        }
else {
    $_SESSION['message'] = 'registration échoué , un probleme dans la base de données est détècté ou bien '. $mail->ErrorInfo;
     header("location: error.php");
         }
	}
	else{
        $_SESSION['message'] = 'vous etes pas un membre dans ESI SBA!';
        header("location: error.php");
    }
}
  
}
}
 function input_check($test){
         if(strlen(trim($test))!=0){
        $test = filter_var($test , FILTER_SANITIZE_STRING);
        $test = htmlspecialchars($test);
      
         }
        else
        {
            $_SESSION['message'] = "Mal entrée !!";
             header("location: error.php");
          
        }
    }

         // So we know the user has logged in
        /*$_SESSION['message'] =
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to  = $email;
        $subject = 'Account Verification ( ESI-SBA.dz ) at '.strftime("%T" , time());
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/esi/ESI_SBA/process/verify.php?email='.$email.'&hash='.$hash;  
       /*$from = "nadirbelmath@gmail.com";
        $headers = "From:{$from}";
        mail( $to, $subject, $message_body) or die.mysql_error();*/
           //redirection to profile page
        