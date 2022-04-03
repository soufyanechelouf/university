<?php
/* Password reset process, updates database with new user password */
require 'connect.php';
session_start();
// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
if (isset($_POST['apply'])){
    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
        $new_password = sha1($_POST['newpassword']);
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $_POST['email'];
        $hash = $_POST['hash'];
        $stmt = $con->prepare("UPDATE users SET Password= :new_password AND Hash= :hash WHERE Email= :email");
       
        if ( $stmt->execute(array(
                'new_password' => $new_password,
                'hash'         => $hash,
				'email'        => $email
               ))
           ) {
        $_SESSION['message'] = "Vous avez actualiser votre mot de passe!";
            $root = "../success.php";
            header("location: ".$root);    
        }
    }
    else {
        $_SESSION['message'] = "Vous avez entrez deux mots de passe differents ! , verifier et réssayer ";
        $r = "error.php";
        header("location:".$r);    
    }
}
}
?>