<?php

     // Eroor Reporting

     ini_set('display_errors','On');
     error_reporting(E_ALL);
     include "admin/connect.php";
     // Routes



     $tpl   = "includes/templates/";  // Template Directory
     $lang  = "includes/languages/"; //  language Directory
     $css   = "layout/css/"; // CSS Directory
     $js    = "layout/js/"; // JS Directory
     $func  = "includes/functions/"; // Functions Directory
     $img   = "admin/"; // Image Directory
     $file   = "admin/"; // Image Directory



     // Include The Important Files 
    
    include $func  . "function.php";
    include $lang . "english.php";
    include $tpl . "header.php";
    if (!isset($Navbar2)){
     include $tpl . "navbar.php";
    }else{
        include $tpl . "navbar2.php";
    }
