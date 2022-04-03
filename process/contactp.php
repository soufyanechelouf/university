<?php 
// Main page with two forms: sign up and log in *
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php'; 
require("connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['envoyer'])) { //user logging in

    
    $_SESSION['FirstName'] = $_POST['first_name'];
    $_SESSION['LastName'] = $_POST['last_name'];
    $_SESSION['Email'] = $_POST['email'];
    if (trim($_POST['first_name'])!=''){
        $first_name = $_POST['first_name'];
    }
    if (trim($_POST['last_name'])!=''){
        $last_name = $_POST['last_name'];
    }
    if (trim($_POST['email'])!=''){
        $email = $_POST['email'];  
    }
    if (trim($_POST['comment'])!=''){
        $body = $_POST['comment'];     
    }
     $password = $_POST['password'];
     //$headers = 'From: '.$email.'\r\n';
     //mail('nadirbelmath@gmail.com','Contact US',$body,$headers);
    // sending the message to admistration
      $mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = $email;
$mail->Password = $password;
$mail->setFrom($email);
$mail->addAddress('nadirbelmath@gmail.com');
$mail->Subject = 'Contact Us email';
$mail->Body = 'Mr. '.$first_name.'  '.$last_name.' '.' est envoyé cle message ce dessous    '.$body.' .'; 
$mail->send() or die.mysql_error();
if ($mail->send()) {
       $_SESSION['message'] = 'Message envoyé, rester brancher pour notre réponse !';
       $root = "../success.php";
       header("Location:" . $root);
}
else {
        $_SESSION['message'] = 'Message non envoyé , réssayer !';
        $root1 = "../error.php";
        header("Location:" . $root1);
        }    
}
}
?>