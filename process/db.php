<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'informatique';
$mysqli = new  mysqli($host,$user,$pass,$db) or die(mysqli_error());
