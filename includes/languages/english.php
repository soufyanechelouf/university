<?php
    
    function lang($phrase) {
    	static $lang = array(
          // Dashboard Page
    	   "Dashboard"    => "DASHBOARD",
    	   "HOME"         => "HOME",
    	   "Categories"   => "CATEGORIES",
    	   "Stats"        => "STATISTICS",
           "comments"     => "COMMENTS",
    	   "Members"      => "MEMBERS",
    	   "Items"        => "ITEMS",
    	   ""             => "",
    	   ""             => ""

    	);
    	return $lang[$phrase];
    }
  
?>