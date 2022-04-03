<?php
require 'PHPMailer-master/PHPMailerAutoload.php'; 
 require "connect.php" ;
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
$_SESSION['grade']     = $_POST['grade'];
$_SESSION['groupid']   = $_POST['status'];
$_SESSION['date']      = date('m/d/Y h:i:s a', time());
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$grade     = $_POST['grade'];
$email     = $_POST['email'] ;
$password  = sha1($_POST['password']);
$hash      = md5( rand(0,1000) );      
$level     = $_POST["select"];
$_SESSION['level']     = $level;
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
    $_SESSION['message'] = 'Cette adresse Email est déja existe !';
    header("location: error.php");
}                  
else
{ 
	// Email doesn't already exist in a database, proceed...
 $str = explode('.',$email);
    $string = explode('@',$email);
    if((strlen($str[0])==1) && ($string[1] == 'esi-sba.dz')){
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
   if ($stmt->rowCount()>0){
        $_SESSION['active']    = 0; 
       //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] =
                 "Le lien de confirmation est envoyé à ". $email. " Svp verifier votre compte !";
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
    ' ,  Merci pour votre registration !
        Svp cliquer sur le lien ci-dessous pour affirmer votre email de registration : 
         http://localhost/Dashboard/ESI_SBA/process/verify.php?email='.$email.'&hash='.$hash; 
//send the message, check for errors
if ($mail->send()) {
        //header("location: monespace.php ");
      $root  = "monespace.php";
        header("location: ". $root);
         } 
      
    }
	}
	else{
        $_SESSION['message'] = 'Vous êtes pas un membre dans notre école , vérifier votre email !';
        header("location: error.php");
    }
}
  
}
}