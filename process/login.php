<?php
require 'connect.php';
/* User login process, checks if user exists and password is correct */
// Escape email to protect against SQL injections
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
   if (isset($_POST['login'])) { 
$email = $_POST['email'];
$password = sha1($_POST['password']);
$stmt = $con->prepare("SELECT * FROM users WHERE Email= :email");
$stmt->bindparam(':email',$email,PDO::PARAM_STR,30);
$stmt->execute();
$result = $stmt->fetch() or die.mysql_error();
if ( $stmt->rowCount() == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Ce adresse email ne correspandant à aucun membre , verifier votre adresse et ressayer ! ";
    header("location: error.php");
}
elseif ($stmt-> rowCount() > 0 ) { // User exist
    if ( $password == $result['Password'] ) {
        $_SESSION['id']        = $result['UserId'];
        $_SESSION['email']     = $result['Email'];
        $_SESSION['firstname'] = $result['FirstName'];
        $_SESSION['lastname']  = $result['LastName'];
        $_SESSION['active']    = $result['RegStatus'];
        $_SESSION['level']     = $result['Level'];
        $_SESSION['grade']     = $result['Grade'];
        $_SESSION['groupid']   = $result['GroupId'];
        $_SESSION['date']      = $result['Date'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $root  = "monespace.php";
        header("location: ".$root);
    }
    else {
        $_SESSION['message'] = "vous n'avez pas entrer la correcte mot de passe , réssayer ";
        header("location: error.php");
    }
}
    }
}
?>