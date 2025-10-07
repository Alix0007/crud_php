<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $_SESSION['username'] = $username;

    if(isset($_POST['remember'])){
        setcookie("username", $username, time()+(86400*7)); // 7 days
    }
    header("Location: dashboard.php");
}else{
    echo "Invalid Login <a href='login.php'>Try again</a>";
}
?>
