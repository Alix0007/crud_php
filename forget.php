<form method="POST">
    <h2>Forget Password</h2>
    <input type="text" name="username" placeholder="Enter Username" required>
    <input type="submit" name="submit" value="Get Hint">
</form>

<?php
if(isset($_POST['submit'])){
    include "db.php";
    $username = $_POST['username'];
    $sql = "SELECT hint FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        echo "Password Hint: ".$row['hint'];
    }else{
        echo "User not found!";
    }
}
?>
