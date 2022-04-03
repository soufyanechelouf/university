<?php
   
      /*
         ** Tiltel function V1.0
         ** Title function that echo the page tiltel in case the page
         ** Has the variable *pageTitle and echo default title for other page
      */
      function getTitle() {
      	 global $pageTitle;
      	 if (isset($pageTitle)){
      	 	echo $pageTitle;
      	 }else{
      	 	echo "Default";
      	 }
    /*
    ** Home Redirect Function V2.0
    ** [THIS FUNCITON ACEEPT PARAMETES]
    ** $theMsg = ECHO the message [ error, success, waring]
    ** $seconds = Seconds Before redirection
    ** $url = the ling you want to Redirect to 
    */ 

     function redirectHome($theMsg, $url = null,  $seconds = 3) {
          if ($url === null){
            $url = "index.php";
          }else{
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
              $url = $_SERVER['HTTP_REFERER'];
            }else{
              $url = "index.php";
            }
                  
          }
          echo $theMsg;
          echo "<div class='alert alert-info'>You Will Be Redirected After $seconds Seconds</div>";
          header("refresh:$seconds; url:$url");
          exit();
     }
     
     /*
     ** Check Items Function V1.0
     ** Function to check  Item in Database [Function accept paramertres]
     ** $select = the items to select [ EX : User, news, events]
     ** $from = the table to select form [EX : users, items, categories]
     ** $value = of value of Select [ Ex : chouaib, box, electronis ..]
     */

     function checkItem($select, $from, $value) {
           global $con;
           $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");  
           $statement->execute(array($value));
           $count = $statement->rowCount();
           return $count;
     }    

     /*
     ** Count Number of Items Function v2.0
     ** Funciton to count number of news, events .. rows
     ** Item = the item to count
     ** $table = the table to choose from
     */
      function somme($item, $table) {
      global $con;
      $stmt = $con->prepare("SELECT COUNT($item) FROM $table");
      $stmt->execute();
      return $stmt->FetchColumn();
     }     
      function total($item, $table, $x, $y) {
      global $con;
      $stmt = $con->prepare("SELECT COUNT($item) FROM $table WHERE $x = '$y'");
      $stmt->execute();
      return $stmt->FetchColumn();
     }
      function totalLevel($item, $table, $x, $y, $z, $a) {
      global $con;
      $stmt = $con->prepare("SELECT COUNT($item) FROM $table WHERE $x = '$y' AND $z = $a");
      $stmt->execute();
      return $stmt->FetchColumn();
     }      
     function countItems($item, $table, $x, $y, $c) {
      global $con;
      $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table WHERE $x = $y AND GroupId = $c");
      $stmt2->execute();
      return $stmt2->FetchColumn();
     }
    

     /*
     ** Count Number of piece Function v2.0
     ** Funciton to count number of items rows
     ** Piece = the pice to count (cours or tds or exams)
     ** $table = the table to choose from
     */
     function countPiece($item, $table, $x, $y) {
      global $con;
      $stmt4 = $con->prepare("SELECT COUNT($item) FROM $table WHERE Level = $x AND Type = $y");
      $stmt4->execute();  
      return $stmt4->FetchColumn();
     }

     /*
     ** Get Latest record Function v1.0
     ** Function to get latest from Databese[users, news, ..]
     ** $select = Field to select
     ** $table  = The table to choose from
     ** 
     */
     
      function getLatest($select, $table, $x , $y, $order, $limit){
        global $con;
        $getStmt = $con->prepare("SELECT $select FROM $table WHERE $x = $y ORDER BY $order DESC LIMIT $limit");
        $getStmt->execute();
        $rows = $getStmt->fetchAll();
        return $rows;
      }   

      }