<?php
     include "connect.php";
     // Routes

     $tpl = "includes/templates/";  // Template Directory
     $lang = "includes/languages/"; //  language Directory
     $css = "layout/css/"; // CSS Directory
     $js = "layout/js/"; // JS Directory
     $func = "includes/functions/"; // Functions Directory


     // Include The Important Files 
    
    include $func  . "function.php";
    include $lang . "english.php";
    include $tpl . "header.php";
    // Include Navbar On all except the one with $noNavbar

    if (!isset($noNavbar)){
     include $tpl . "navbar.php";
    }


    