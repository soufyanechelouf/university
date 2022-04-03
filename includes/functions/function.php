<?php
    
     /*
     ** Get Latest record Function v1.0
     ** Function to get All from Any Table Databese
     ** 
     */
      function getAll($tableName, $order){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName ORDER BY $order DESC ");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      }    
     /*
     ** Get Latest record Function v1.0
     ** Function to get Categories from Databese
     ** 
     */
      function getNews($tableName, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName ORDER BY Date DESC LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      }
      function getSlider($tableName, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE InSlider = 1 ORDER BY Date DESC LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      }                
      function getNew($tableName, $limit, $type){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE Type = '$type' ORDER BY Date DESC LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      }        
      function getBio($tableName, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName ORDER BY BioId DESC LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      }  
      function getEtude($tableName, $type, $level, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE type = '$type' AND Level = $level ORDER BY Date DESC LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return$All;
      } 
      function getModule($tableName, $level, $type, $module, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE Level = $level AND  Type = '$type' AND Module = '$module' LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return $All;
      } 
      function getExam($tableName, $level, $type, $module, $year, $limit){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE Level = $level AND  Type = '$type' AND Module = '$module' AND Year = '$year' LIMIT $limit");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return $All;
      }                             

     /*
     ** Get Latest Items Function v2.0
     ** Function to get Items from Databese
     ** 
     */
      function getItem($where, $value, $order, $limit,$approve = NULL){
        global $con;
        if ($approve == NULL){
          $sql = "AND Approve = 1";
        }else{
          $sql = NULL;
        }
        $getItem = $con->prepare("SELECT * FROM items WHERE $where = ? $sql ORDER BY $order DESC LIMIT  $limit");
        $getItem->execute(array($value));
        $items = $getItem->fetchAll();
        return$items;
      }

   
    /*
      ** Tilte function V1.0
      ** Title function that echo the page tilte in case the page
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
     ** Function count numbers of cours, td ,exam
     */
      function totalLevel($item, $table, $x, $y, $z, $a) {
      global $con;
      $stmt = $con->prepare("SELECT COUNT($item) FROM $table WHERE $x = '$y' AND $z = $a");
      $stmt->execute();
      return $stmt->FetchColumn();
     } 
      function total($item, $table, $x, $y) {
      global $con;
      $stmt = $con->prepare("SELECT COUNT($item) FROM $table WHERE $x = '$y'");
      $stmt->execute();
      return $stmt->FetchColumn();
     }
    /*
      ** Notification function V1.0
      ** Functino to get notificatin from database
      ** Has the variable *pageTitle and echo default title for other page
     */
      function getNotification($tableName, $destina, $group){
        global $con;
        $getAll = $con->prepare("SELECT * FROM notifications WHERE NotDestina = '$destina' AND NotGroupId = '$group' OR NotGroupId = 'ALL'  AND CURDATE() BETWEEN Date AND Valabe ORDER BY Date desc");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return $All;
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
     ** $select = the items to select [ EX : User, Item, Categoris]
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
     ** Funciton to count number of items rows
     ** Item = the item to count
     ** $table = the table to choose from
     */
     function countItems($item, $table) {
      global $con;
      $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");
      $stmt2->execute();
      return $stmt2->FetchColumn();
     }

     /*
     ** Get Latest record Function v1.0
     ** Function to get latest from Databese[users, items, ..]
     ** $select = Field to select
     ** $table  = The table to choose from
     ** 
     */
      function getLatest($select, $table, $order, $limit = 5){
        global $con;
        $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
        $getStmt->execute();
        $rows = $getStmt->fetchAll();
        return$rows;
      }     
      function getLatestNews($select, $table, $x, $order, $limit = 5){
        global $con;
        $getStmt = $con->prepare("SELECT $select FROM $table WHERE Type = '$x' ORDER BY $order DESC LIMIT $limit");
        $getStmt->execute();
        $rows = $getStmt->fetchAll();
        return$rows;
      }      
    }
        function getArchive($table, $date){
        global $con;
        $getStmt = $con->prepare("SELECT * FROM $table WHERE  Date BETWEEN DATE_SUB(CURDATE(),INTERVAL $date) AND CURDATE()");
        $getStmt->execute();
        $rows = $getStmt->fetchAll();
        return$rows;
      }  
      function serching($tableName, $level, $select, $select2, $needle){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE Level = $level AND $select LIKE '%$needle%' OR $select2 LIKE '%needle%'");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return $All;
      }    
      function recherche($tableName, $select, $needle){
        global $con;
        $getAll = $con->prepare("SELECT * FROM $tableName WHERE $select LIKE '%$needle%' ORDER BY Date DESC");
        $getAll->execute();
        $All = $getAll->fetchAll();
        return $All;
      }               
     /*
     ** CHECK if User is not Activated v1.0
     ** Function to Check to reg status of the user
     */   
    function checkUserStatus($user) {
      global $con;
      $stmtx = $con->prepare("SELECT Username, RegStatus

                                         FROM
                                               users
                                         WHERE 
                                               Username =? 
                                         AND   RegStatus =0 
                                         ");
      $stmtx->execute(array($user));
      $status = $stmtx->rowCount();
      return $status;
    }

    function getMontName($date){
      $month = date('m', strtotime($date));
                            switch ($month) {
                               case '1':
                                 echo "Janvier";
                                 break;
                               case '2':
                                 echo "Fevrier";                             
                                 break;
                               case '3':
                                 echo "Mars";                                 
                                 break;
                               case '4':
                                 echo "Avril";
                                 break;
                               case '5':
                                 echo "Mai";                               
                               break;
                               case '6':
                                 echo "Juin";                                 
                                 break;
                               case '7':
                                 echo "Juillet";
                                 break;
                               case '8':
                                 echo "Aôut";                               
                               break;
                               case '9':
                                 echo "Septembre";                                 
                                 break;
                               case '10':
                                 echo "Octobre";
                                 break;
                               case '11':
                                 echo "Novembre";                               
                               break;
                               case '12':
                                 echo "Decembre";                                 
                                 break;                                                                                                   
                             } 
    }
    function get($date){
      return  ', ' . getMontName($date) . date('d', strtotime($date)) . ' '  . '20' .date('y', strtotime($date));
    }



    /*
    */