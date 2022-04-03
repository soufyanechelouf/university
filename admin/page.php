<?php 

    /*
    
        Categories => [Manage | Edit | Update | Add | Insert | Delete | Stats]
    
    */
    $do = isset($_GET["do"]) ? $_GET["do"] : "manage";


    // If the page is the Main Page

    if ($do = "Manage"){
    	echo "Manage";
    }elseif($do = "Add"){
    	echo "Add";
    }elseif($do = "Insert"){
    	
    }elseif ($do = "Delete"){

    }elseif ($do = "Stats"){

    }elseif ($do = "Update"){

    }elseif ($do = "Edit"){

    }else{
    	echo "dfdfsdf";
    }