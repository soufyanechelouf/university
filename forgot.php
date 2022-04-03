<?php 
/* Reset your password form, sends reset.php password link */
 ob_start();
 session_start();
 require 'PHPMailer-master/PHPMailerAutoload.php'; 
 require "init.php";
 // Check if form submitted with method="post"
 if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
 if (isset($_POST['reset'])) {  
 $email =$_POST['email'];
 $stmt = $con->prepare(" SELECT * FROM users WHERE Email=:email ");
 $stmt->bindparam(':email',$email,PDO::PARAM_STR,30) or die.mysql_error();
 $stmt->execute();
 $result = $stmt->fetch();
    if($stmt->rowCount() ==0 ) // User doesn't exist
    { 
        $_SESSION['message'] ="Ce adresse email ne correspandant à aucun membre , verifier votre adresse et ressayer ! ";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)
          // $user becomes array with user data
        $email = $result['Email'];
        $hash = $result['Hash'];
        $first_name = $result['FirstName'];
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
        $mail->Subject = 'RESET password link';
        $mail->Body = ' Bonjour  '.$first_name.',
        Vous avez demandez un actualisation de mot de passe !
        Svp cliquer sur le lien suivant pour actualiser :
       http://localhost/Dashboard/ESI_SBA/reset.php?email='.$email.'&hash='.$hash;  
//send the message, check for errors
if ($mail->send()) {
     $_SESSION['message'] = "<p>vérifier votre email <span>$email</span>"
        . " pour un lien de confirmation !</p>";
    header("location: success.php");
         }
 else {
         $_SESSION['message'] = "le message n'est pas envoyé , réssayer  ";
          header("location: error.php");
        }
  }
}
}
?>
    <section class="signing">
          <div class="container">
                        <div class="row">
                                  <div class="col-xs-12 heading">
                                    <h2 class="h1 text-center">Password reset ...
                                      </h2>
                                  </div>
                                          <div class="form">

                                            <h2>Enter your Email addresse</h2>
                                            <form action="forgot.php" method="post">
                                             <div class="field-wrap">
                                              <label>
                                                Email Addresse<span class="req">*</span>
                                              </label>
                                              <input type="email"required autocomplete="off" name="email"/>
                                            </div>
                                            <button name="reset" type="submit" class="button button-block"/>Reset</button>
                                            </form>
                                        </div>
                 </div>
         </div>
  </section >
<?php
       include $tpl . 'footer.php';
       ob_end_flush();
 ?>  
