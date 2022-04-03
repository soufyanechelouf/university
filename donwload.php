<?php  
       ob_start(); // Output Buffering Start
       session_start();
       $pageTitle = "ESI File";
    if (isset($_SESSION["email"])){
        $Navbar2 = " "; 
        include "init.php";
                        
                        // Get File With Id
                        $id = $_GET['id'];
                        $getFile = $con->prepare("SELECT File FROM study WHERE StudyId = $id ");
                        $getFile->execute();
                        $file = $getFile->fetch(); 
                        $file = 'admin/' . $file['File'];
                        echo $file;
                        if (file_exists($file)) {
                            header('Content-Description: File Transfer');
                            header('Content-Type: application/octet-stream');
                            header("Content-Type: application/force-download");
                            header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
                            // header('Content-Transfer-Encoding: binary');
                            header('Expires: 0');
                            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                            header('Pragma: public');
                            header('Content-Length: ' . filesize($file));
                            ob_clean();
                            flush();
                            readfile($file);
                            exit;
                        }

       ob_end_flush();
    }else{
      header("location :index.php");
    }
 ?>          