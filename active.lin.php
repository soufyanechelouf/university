<?php  
        function getdatabetween($string, $start, $end){
        $sp = strpos($string, $start)+strlen($start);
        $ep = strpos($string, $end)-strlen($start);
        $data = trim(substr($string, $sp, $ep));
        return trim($data);
    }
         // Get Active Link
         $url =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
         $curLink = substr($url, 0, strpos($url, '.'));
?>