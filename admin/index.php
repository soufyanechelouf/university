<?php  
    
    session_start();
    $noNavbar = "";
    $pageTitle = "Login";
    if (isset($_SESSION["Email"])){
    	header("location: home.php");;
    }
    include "init.php";



    // Check if user comoing from HTTP Post Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$email = $_POST["email"];
    	$password = $_POST["pass"];
    	$hashedPass = sha1($password);

    	// Check If User Exist in Database
    	$stmt = $con->prepare("SELECT UserId, Email, Password
                                         FROM
                                               users
                                         WHERE 
                                               Email =? 
                                         AND   Password = ?
                                         AND   GroupId  = 0
                                         LIMIT 1");
    	$stmt->execute(array($email,$hashedPass));
      $row = $stmt->Fetch();
    	$count = $stmt->rowCount();

    	// If Count > 0 this mean the database contain record about this username 
    	if ($count > 0 ){
    		$_SESSION["Email"] = $email; // Register Session Email
        $_SESSION["ID"] = $row['UserId']; // Register session id
    		header("location: home.php"); // Redirect to Home Page
    		exit();
    	}


    }
?>

    <h1 class="text-center" style="margin-top: 80px">Ecole Superieure En Informatique <br>Sidi Bel Abbes</h1>
    <div class="login">
      <div class="login-triangle"></div>
      <h2 class="login-header" >Control Panel</h2>
        <form class="login-container" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="email" placeholder="Email" name="email"></p>
        <p><input type="password" placeholder="Password" name="pass"></p>
        <p><input type="submit" value="Log in"></p>
      </form>
    </div>

   
<?php  include $tpl . 'footer.php'; ?>
