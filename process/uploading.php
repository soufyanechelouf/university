<?php
$db  = new mysqli('localhost','root','','users');


$file_path = $db->real_escape_string('image/'.$_FILES['file']['name'])
//make sure of a specified type of //files
 if(pre_match("!type!",$_FILES['file']['type']));
{
//copy image to our file_path
if(copy($_FILES['file']['tmp_name'],$file_path)){
$_SESSION['file'] = $file_path;
$sql = "INSERT INTO     users (username....,file)"
."VALUES ('','',...'$file_path')"
if($db->query($sql)===true){
$_SESSION['message'] = ' you've registered' ;
}
}

}
>