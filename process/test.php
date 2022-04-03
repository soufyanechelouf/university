
<?php
  include 'db.php';                                   
                                                 
                                                      $st = $mysqli->query("SELECT * FROM classes");
                                                   $classes = mysqli_fetch_array($st);                 
    foreach ($classes as $cl)
                                       { 
                  echo   "{$cl['']}------"."--------{$cl[0]}";
                                       }

                                                  ?>              
                                               
      
                                               