<?php
$server = "localhost";
$user = "root"; 
$pass = "alishahzad0007"; 
$dbname = "assignment_db";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
