<?php

     session_start();  // Start The Session
     session_unset();  // unset the Date
     session_destroy(); // Destroy The S
     header('location: index.php');
     exit();